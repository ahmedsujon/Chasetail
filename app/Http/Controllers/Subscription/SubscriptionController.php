<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Subscription;
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
                // Captured from the authorization response.
                $transactionReference = $response->getTransactionReference();

                $response = $this->gateway->capture([
                    'amount' => $request->multiple_image ? session('plan_price') + 29 : session('plan_price'),
                    'currency' => 'USD',
                    'transactionReference' => $transactionReference,
                ])->send();

                $transaction_id = $response->getTransactionReference();
                $amount = $request->multiple_image ? session('plan_price') + 29 : session('plan_price');

                // Insert transaction data into the database
                $isPaymentExist = Subscription::where('transaction_id', $transaction_id)->first();

                if (!$isPaymentExist) {
                    $payment = new Subscription;
                    $payment->transaction_id = $transaction_id;
                    $payment->card_holder_name = $request->card_holder_name;
                    $payment->multiple_image = $request->multiple_image;
                    $payment->amount = $request->multiple_image ? session('plan_price') + 29 : session('plan_price');
                    $payment->currency = 'USD';
                    $payment->payment_status = 'Captured';
                    $payment->user_id = Auth::user()->id;
                    $payment->save();
                }
                return redirect()->route('app.subscription.success', ['transaction_id' => $transaction_id]);
            } else {
                // not successful
                return $response->getMessage();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
