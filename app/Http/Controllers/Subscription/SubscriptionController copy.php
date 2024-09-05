<?php

namespace App\Http\Controllers\Subscription;

use Carbon\Carbon;
use App\Models\User;
use Omnipay\Omnipay;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
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
                }
                session()->forget(['plan_price', 'plan']);
                return redirect()->route('app.subscription.success', ['transaction_id' => $transaction_id, 'amount' => $amount]);
            } else {
                // not successful
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
