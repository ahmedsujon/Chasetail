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
use Illuminate\Support\Facades\Mail;

class PlanCSubscriptionController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('AuthorizeNetApi_Api');
        $this->gateway->setAuthName(env('ANET_API_LOGIN_ID'));
        $this->gateway->setTransactionKey(env('ANET_TRANSACTION_KEY'));
        $this->gateway->setTestMode(true); //comment this line when move to 'live'
    }

    public function subscription(Request $request)
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
            $creditCard = new \Omnipay\Common\CreditCard([
                'number' => $request->input('cc_number'),
                'expiryMonth' => $request->input('expiry_month'),
                'expiryYear' => $request->input('expiry_year'),
                'cvv' => $request->input('cvv'),
            ]);

            // Generate a unique merchant site transaction ID.
            $transactionId = rand(100000000, 999999999);

            $response = $this->gateway->authorize([
                'amount' => $request->multiple_image ? session('plan_price') + 29 : session('plan_price'),
                'currency' => 'USD',
                'transactionId' => $transactionId,
                'card' => $creditCard,
            ])->send();

            if ($response->isSuccessful()) {
                if (session('plan') == 'PlanA') {
                    $total_amount = $request->multiple_image ? session('plan_price') : session('plan_price');
                } else {
                    $total_amount = $request->multiple_image ? session('plan_price') + 29 : session('plan_price');
                }

                // Captured from the authorization response.
                $transactionReference = $response->getTransactionReference();

                $response = $this->gateway->capture([
                    'amount' => $total_amount,
                    'currency' => 'USD',
                    'transactionReference' => $transactionReference,
                ])->send();

                $transaction_id = $response->getTransactionReference();
                $amount = $total_amount;

                // Insert transaction data into the database
                $isPaymentExist = Subscription::where('transaction_id', $transaction_id)->first();

                if (!$isPaymentExist) {
                    $payment = new Subscription;
                    $payment->transaction_id = $transaction_id;
                    $payment->card_holder_name = $request->card_holder_name;
                    $payment->multiple_image = $request->multiple_image ? 1 : 0;
                    $payment->amount = $total_amount;
                    $payment->plan = session('plan');
                    $payment->currency = 'USD';
                    $payment->payment_status = 'Captured';
                    $payment->user_id = Auth::user()->id;
                    $payment->save();

                    $user = User::find(Auth::user()->id);
                    $user->subscription = 1;
                    $user->save();

                    // Save the Lost Dog data
                    $data = new LostDog();
                    $data->user_id = Auth::user()->id;
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
                    $data->medicine_info = session('medicine_info');
                    $data->description = session('description');
                    $data->save();

                    $user->subscription = 0;
                    $user->save();

                    // Prepare email data
                    $mailData['images'] = session('images');
                    $mailData['address'] = session('address');
                    $mailData['name'] = session('name');
                    $mailData['breed'] = session('breed');
                    $mailData['color'] = session('color');
                    $mailData['marking'] = session('marking');
                    $mailData['gender'] = session('gender');
                    $mailData['last_seen'] = session('last_seen');
                    $mailData['medicine_info'] = session('medicine_info');
                    $mailData['description'] = session('description');
                    $mailData['id'] = $data->id;

                    $users = DB::table('users')->select('id', 'latitude', 'longitude')->where('id', '!=', Auth::user()->id)->get();
                    $usersWithDistances = [];
                    foreach ($users as $user) {
                        if (isset($data->latitude) && isset($data->longitude)) {
                            $distance = getDistance($data->latitude, $data->longitude, $user->latitude, $user->longitude);
                            if ($distance <= 10) {
                                $usersWithDistances[] = [
                                    'user_id' => $user->id,
                                    'distance' => $distance,
                                ];
                            }
                        }
                    }

                    usort($usersWithDistances, function ($a, $b) {
                        return $a['distance'] <=> $b['distance'];
                    });

                    $nearestUsers = array_slice($usersWithDistances, 0, 250);
                    $userIds = array_column($nearestUsers, 'user_id');

                    // Send SMS to nearest users
                    $author_phones = User::whereIn('id', $userIds)->pluck('phone')->toArray();

                    $message = "LOST DOG! Alert!:\n";
                    $message .= "Name: " . $mailData['name'] . "\n";
                    $message .= "Description: " . $mailData['description'] . "\n";
                    $message .= "More details & photo: https://chasetail.com/lostdogs/" . $mailData['id'];

                    $sid = env('TWILIO_SID');
                    $token = env('TWILIO_TOKEN');
                    $fromNumber = env('TWILIO_FROM');

                    $successCount = 0;
                    $errorCount = 0;
                    $errors = [];

                    foreach ($author_phones as $user_phone) {
                        $receiverNumber = $user_phone;

                        try {
                            $client = new Client($sid, $token);
                            $client->messages->create($receiverNumber, [
                                'from' => $fromNumber,
                                'body' => $message
                            ]);
                            $successCount++;
                        } catch (Exception $e) {
                            $errorCount++;
                            $errors[] = 'Error sending to ' . $receiverNumber . ': ' . $e->getMessage();
                        }
                    }

                    $resultMessage = "Data stored and SMS sent successfully to $successCount users.";
                    if ($errorCount > 0) {
                        $resultMessage .= " However, there were errors sending to $errorCount users.";
                        $resultMessage .= " Errors: " . implode(", ", $errors);
                    }
                }
                session()->forget(['plan_price', 'plan']);
                return redirect()->route('app.subscription.success', ['transaction_id' => $transaction_id, 'amount' => $amount]);
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
