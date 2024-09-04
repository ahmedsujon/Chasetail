<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client; // make sure to import the Twilio client

class SmsTwilioController extends Controller
{
    public function sendSms()
    {
        $receiverNumber = '+14698783479'; // Replace with the recipient's phone number
        $message = 'Hi! this is from chasetail testing. Let me know if you get this message.'; // Replace with your desired message

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $fromNumber = env('TWILIO_FROM');

        try {
            $client = new Client($sid, $token);
            $client->messages->create($receiverNumber, [
                'from' => $fromNumber,
                'body' => $message
            ]);

            return 'SMS Sent Successfully.';
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
