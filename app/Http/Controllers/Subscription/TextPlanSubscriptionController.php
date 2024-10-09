<?php

namespace App\Http\Controllers\Subscription;

use Carbon\Carbon;
use App\Models\User;
use Omnipay\Omnipay;
use App\Models\LostDog;
use Twilio\Rest\Client;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TextPlanSubscriptionController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('AuthorizeNetApi_Api');
        $this->gateway->setAuthName(env('ANET_API_LOGIN_ID'));
        $this->gateway->setTransactionKey(env('ANET_TRANSACTION_KEY'));
        $this->gateway->setTestMode(true); //comment this line when move to 'live'
    }

    public function textPlanSubscription(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'cc_number' => 'required',
            'expiry_month' => 'required|numeric|min:1|max:12',
            'expiry_year' => 'required',
            'card_holder_name' => 'required',
            'cvv' => 'required',
        ]);

        try {
            // Check if the user is logged in
            if (!Auth::check()) {
                // Create a new user with session data if the user is not logged in
                $userData = new User();
                $userData->name = session('name');
                $userData->email = session('email');
                $userData->phone = session('phone');
                $userData->password = bcrypt(session('password')); // Encrypt the password before saving
                $userData->save();
                // Log the newly created user in
                Auth::login($userData);
            }

            // Process payment using Omnipay
            $creditCard = new \Omnipay\Common\CreditCard([
                'number' => $request->input('cc_number'),
                'expiryMonth' => $request->input('expiry_month'),
                'expiryYear' => $request->input('expiry_year'),
                'cvv' => $request->input('cvv'),
            ]);

            // Generate a unique merchant site transaction ID
            $transactionId = rand(100000000, 999999999);

            // Authorize the payment
            $response = $this->gateway->authorize([
                'amount' => session('plan_price'),
                'currency' => 'USD',
                'transactionId' => $transactionId,
                'card' => $creditCard,
            ])->send();

            if ($response->isSuccessful()) {
                // Determine the total amount
                $total_amount = session('plan_price');

                // Capture the authorized payment
                $transactionReference = $response->getTransactionReference();
                $response = $this->gateway->capture([
                    'amount' => $total_amount,
                    'currency' => 'USD',
                    'transactionReference' => $transactionReference,
                ])->send();

                $transaction_id = $response->getTransactionReference();

                // Insert transaction data into the database
                $isPaymentExist = Subscription::where('transaction_id', $transaction_id)->first();

                if (!$isPaymentExist) {
                    $payment = new Subscription();
                    $payment->transaction_id = $transaction_id;
                    $payment->card_holder_name = $request->card_holder_name;
                    $payment->amount = $total_amount;
                    $payment->plan = session('plan');
                    $payment->currency = 'USD';
                    $payment->payment_status = 'Captured';
                    $payment->user_id = Auth::user()->id;
                    $payment->save();

                    // Update user's subscription status
                    $user = Auth::user();

                    // Save the Lost Dog data
                    $data = new LostDog();
                    $data->user_id = $user->id;
                    $data->latitude = session('latitude');
                    $data->longitude = session('longitude');
                    $data->images = session('images');
                    $data->address = session('address');
                    $data->name = session('name');
                    $data->breed = session('breed');
                    $data->color = session('color');
                    $data->marking = session('marking');
                    $data->gender = session('gender');
                    $data->last_seen = session('last_seen');
                    $data->description = session('description');
                    $data->save();

                    // Notify nearest users via SMS/MMS
                    $users = DB::table('users')
                        ->select('id', 'latitude', 'longitude')
                        ->where('id', '!=', $user->id)
                        ->get();

                    $usersWithDistances = [];
                    foreach ($users as $nearbyUser) {
                        if (isset($data->latitude) && isset($data->longitude)) {
                            $distance = getDistance($data->latitude, $data->longitude, $nearbyUser->latitude, $nearbyUser->longitude);
                            if ($distance <= 10) {
                                $usersWithDistances[] = [
                                    'user_id' => $nearbyUser->id,
                                    'distance' => $distance,
                                ];
                            }
                        }
                    }

                    usort($usersWithDistances, fn($a, $b) => $a['distance'] <=> $b['distance']);
                    $nearestUsers = array_slice($usersWithDistances, 0, 250);
                    $userIds = array_column($nearestUsers, 'user_id');

                    // Send SMS or MMS to nearest users
                    $author_phones = User::whereIn('id', $userIds)->pluck('phone')->toArray();
                    $message = "Name: " . $data->name . "; Color: " . $data->color . "; Gender: " . $data->gender . "; Lost Date: " . $data->last_seen . "; Marking: " . $data->marking . "; " . $data->description . ".";

                    $sid = env('TWILIO_SID');
                    $token = env('TWILIO_TOKEN');
                    $fromNumber = env('TWILIO_FROM');

                    $successCount = 0;
                    $errorCount = 0;
                    $errors = [];

                    foreach ($author_phones as $user_phone) {
                        try {
                            $client = new Client($sid, $token);
                            $messageData = [
                                'from' => $fromNumber,
                                'body' => $message,
                            ];
                            $client->messages->create($user_phone, $messageData);
                            $successCount++;
                        } catch (Exception $e) {
                            $errorCount++;
                            $errors[] = 'Error sending to ' . $user_phone . ': ' . $e->getMessage();
                        }
                    }

                    $resultMessage = "Data stored and SMS/MMS sent successfully to $successCount users.";
                    if ($errorCount > 0) {
                        $resultMessage .= " However, there were errors sending to $errorCount users.";
                        $resultMessage .= " Errors: " . implode(", ", $errors);
                    }
                }

                session()->forget(['plan_price', 'plan']);
                return redirect()->route('app.subscription.success', ['transaction_id' => $transaction_id, 'amount' => $total_amount]);
            } else {
                return $response->getMessage();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // Luhn algorithm to validate credit card numbers
    private function isValidLuhn($number)
    {
        $sum = 0;
        $length = strlen($number);
        for ($i = 0; $i < $length; $i++) {
            $digit = (int) $number[$length - $i - 1];
            if ($i % 2 === 1) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $sum += $digit;
        }
        return $sum % 10 === 0;
    }
}
