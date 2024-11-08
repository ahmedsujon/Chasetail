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

class PlanESubscriptionController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('AuthorizeNetApi_Api');
        $this->gateway->setAuthName(env('ANET_API_LOGIN_ID'));
        $this->gateway->setTransactionKey(env('ANET_TRANSACTION_KEY'));
        $this->gateway->setTestMode(true); //comment this line when move to 'live'
    }


    public function PlanESubscription(Request $request)
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

            // Prepare credit card data for the gateway
            $creditCard = new \Omnipay\Common\CreditCard([
                'number' => $request->input('cc_number'),
                'expiryMonth' => $request->input('expiry_month'),
                'expiryYear' => $request->input('expiry_year'),
                'cvv' => $request->input('cvv'),
            ]);

            // Set the transaction amount based on plan
            $planPrice = session('plan_price');
            $totalAmount = $planPrice;

            // Generate a unique merchant transaction ID
            $transactionId = rand(100000000, 999999999);

            // Authorize the payment
            $response = $this->gateway->authorize([
                'amount' => $totalAmount,
                'currency' => 'USD',
                'transactionId' => $transactionId,
                'card' => $creditCard,
            ])->send();

            if ($response->isSuccessful()) {
                // Capture the payment
                $transactionReference = $response->getTransactionReference();
                $captureResponse = $this->gateway->capture([
                    'amount' => $totalAmount,
                    'currency' => 'USD',
                    'transactionReference' => $transactionReference,
                ])->send();

                $transaction_id = $captureResponse->getTransactionReference();

                // Check if the transaction already exists
                if (!Subscription::where('transaction_id', $transaction_id)->exists()) {
                    // Store the subscription and payment data
                    $payment = new Subscription();
                    $payment->fill([
                        'transaction_id' => $transaction_id,
                        'card_holder_name' => $request->card_holder_name,
                        'amount' => $totalAmount,
                        'plan' => session('plan'),
                        'currency' => 'USD',
                        'payment_status' => 'Captured',
                        'user_id' => Auth::id(),
                    ])->save();

                    // Save the lost dog data
                    $lostDogData = session()->only([
                        'latitude',
                        'longitude',
                        'images',
                        'address',
                        'name',
                        'breed',
                        'marking',
                        'gender',
                        'last_seen',
                        'description'
                    ]);
                    $lostDogData['user_id'] = Auth::id();
                    $lostDog = LostDog::create($lostDogData);

                    // Find nearby users within 10 km
                    $usersNearby = DB::table('users')
                        ->select('id', 'latitude', 'longitude')
                        ->where('id', '!=', Auth::id())
                        ->get()
                        ->filter(function ($user) use ($lostDog) {
                            return isset($lostDog->latitude, $lostDog->longitude) &&
                                getDistance($lostDog->latitude, $lostDog->longitude, $user->latitude, $user->longitude) <= 10;
                        })
                        ->take(1000);

                    $userIds = $usersNearby->pluck('id')->toArray();
                    $emails = User::whereIn('id', $userIds)->pluck('email')->toArray();

                    // Prepare email data
                    $mailData = [
                        'id' => $lostDog->id,
                        'name' => $lostDog->name,
                        'last_seen' => $lostDog->last_seen,
                        'images' => $lostDog->images,
                        'gender' => $lostDog->gender,
                        'address' => $lostDog->address,
                        'last_seen' => $lostDog->last_seen,
                        'breed' => $lostDog->breed,
                        'color' => $lostDog->color,
                        'marking' => $lostDog->marking,
                        'description' => $lostDog->description,
                    ];

                    // Send email notifications to nearby users
                    foreach ($emails as $email) {
                        Mail::send('emails.lostdog-report', $mailData, function ($message) use ($email) {
                            $message->to($email)
                                ->subject('Lost Pet Notification');
                        });
                    }

                    // Clear session data related to the plan
                    session()->forget([
                        'plan_price',
                        'plan',
                        'latitude',
                        'longitude',
                        'images',
                        'address',
                        'id',
                        'name',
                        'breed',
                        'color',
                        'marking',
                        'gender',
                        'last_seen',
                        'medicine_info',
                        'description'
                    ]);

                    return redirect()->route('app.subscription.success', [
                        'transaction_id' => $transaction_id,
                        'amount' => $totalAmount
                    ]);
                }
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
