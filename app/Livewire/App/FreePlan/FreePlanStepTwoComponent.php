<?php

namespace App\Livewire\App\FreePlan;

use App\Models\User;
use App\Models\LostDog;
use Livewire\Component;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FreePlanStepTwoComponent extends Component
{
    public $user_id, $id, $breed, $medicine_info, $payment_status, $address, $longitude, $photos, $images, $name, $gender, $last_seen, $microchip_id, $description;

    public $characterCount = 0;
    public $maxCharacters = 150;

    public function updatedDescription()
    {
        $this->characterCount = strlen($this->description);
    }

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'gender' => 'required',
            'last_seen' => 'required',
        ]);

        $data = new LostDog();
        $data->user_id = Auth::user()->id;

        $data->latitude = session('latitude');
        $data->longitude = session('longitude');
        $data->images = session('images');
        $data->address = session('address');

        $data->breed = $this->breed;
        $data->name = $this->name;
        $data->payment_status = 'free';
        $data->gender = $this->gender;
        $data->last_seen = $this->last_seen;
        $data->microchip_id = $this->microchip_id;
        $data->medicine_info = $this->medicine_info;
        $data->description = $this->description;
        $data->save();

        $user = User::find(Auth::user()->id);
        $user->subscription = 0;
        $user->save();

        // Prepare email data
        $mailData['name'] = $this->name;
        $mailData['last_seen'] = $this->last_seen;
        $mailData['images'] = session('images');
        $mailData['gender'] = $this->gender;
        $mailData['address'] = session('address');
        $mailData['microchip_id'] = $this->microchip_id;
        $mailData['medicine_info'] = $this->medicine_info;
        $mailData['description'] = $this->description;
        $mailData['id'] = $data->id;

        // Get all users' emails
        $users = User::all();
        $author_emails = $users->pluck('email');

        foreach ($author_emails as $email) {
            Mail::send('emails.lostdog-report', $mailData, function ($message) use ($mailData, $email) {
                $message->to($email)
                    ->subject('Lost Dog Notification');
            });
        }



        // Send SMS to all users
        // $users = User::all();
        // $message = "LOST DOG! Alert!:\n";
        // $message .= "Name: " . $mailData['name'] . "\n";
        // $message .= "Last Seen: " . $mailData['address'] . "\n";
        // $message .= "Description: " . $mailData['description'] . "\n";
        // $message .= "More details & photo: https://chasetail.com/lostdogs/" . $mailData['id'];

        // $sid = env('TWILIO_SID');
        // $token = env('TWILIO_TOKEN');
        // $fromNumber = env('TWILIO_FROM');

        // $successCount = 0;
        // $errorCount = 0;
        // $errors = [];

        // foreach ($users as $user) {
        //     $receiverNumber = $user->phone;

        //     try {
        //         $client = new Client($sid, $token);
        //         $client->messages->create($receiverNumber, [
        //             'from' => $fromNumber,
        //             'body' => $message
        //         ]);
        //         $successCount++;
        //     } catch (Exception $e) {
        //         $errorCount++;
        //         $errors[] = 'Error sending to ' . $receiverNumber . ': ' . $e->getMessage();
        //     }
        // }

        // $resultMessage = "Data stored and SMS sent successfully to $successCount users.";
        // if ($errorCount > 0) {
        //     $resultMessage .= " However, there were errors sending to $errorCount users.";
        //     $resultMessage .= " Errors: " . implode(", ", $errors);
        // }




        // MMS Send
        // Send MMS to all users
        $users = User::all(); // Get all users

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $fromNumber = env('TWILIO_FROM');

        $successCount = 0;
        $errorCount = 0;
        $errors = [];

        foreach ($users as $user) {
            $receiverNumber = $user->phone;
            $message = "Hi! This is from Chasetail. Lost dog report:\n";
            $message .= "Name: " . $mailData['name'] . "\n";
            $message .= "Last Seen: " . $mailData['last_seen'] . "\n";
            $message .= "Description: " . $mailData['description'];

            // Extract image URLs from session
            $imageUrls = $mailData['images'] ?? [];

            try {
                $client = new Client($sid, $token);
                $client->messages->create($receiverNumber, [
                    'from' => $fromNumber,
                    'body' => $message,
                    'mediaUrl' => $imageUrls // Pass the image URLs here
                ]);
                $successCount++;
            } catch (Exception $e) {
                $errorCount++;
                $errors[] = 'Error sending to ' . $receiverNumber . ': ' . $e->getMessage();
            }
        }

        $resultMessage = "Data stored and MMS sent successfully to $successCount users.";
        if ($errorCount > 0) {
            $resultMessage .= " However, there were errors sending to $errorCount users.";
            $resultMessage .= " Errors: " . implode(", ", $errors);
        }



        return $this->redirect('/user/dashboard', navigate: true);
        session()->flash('success', 'Report posted added successfully');
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->user_id = null;
        $this->longitude = null;
        $this->payment_status = null;
        $this->photos = null;
        $this->breed = null;
        $this->name = null;
        $this->gender = null;
        $this->address = null;
        $this->last_seen = null;
        $this->microchip_id = null;
        $this->medicine_info = null;
        $this->description = null;
    }

    public function render()
    {
        return view('livewire.app.free-plan.free-plan-step-two-component')->layout('livewire.app.layouts.base');
    }
}
