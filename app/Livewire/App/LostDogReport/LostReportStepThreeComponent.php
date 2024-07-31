<?php

namespace App\Livewire\App\LostDogReport;

use App\Models\User;
use App\Models\LostDog;
use Livewire\Component;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LostReportStepThreeComponent extends Component
{
    public $user_id, $longitude, $photos, $name, $gender, $last_seen, $address, $images, $microchip_id, $medicine_info, $description;

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'gender' => 'required',
            'last_seen' => 'required',
            'description' => 'required',
        ]);

        $data = new LostDog();
        $data->user_id = Auth::user()->id;

        $data->longitude = session('longitude');
        $data->images = session('images');

        $data->name = $this->name;
        $data->payment_status = 'paid';
        $data->gender = $this->gender;
        $data->last_seen = $this->last_seen;
        $data->microchip_id = $this->microchip_id;
        $data->medicine_info = $this->medicine_info;
        $data->description = $this->description;
        $data->save();

        $user = User::find(Auth::user()->id);
        $user->subscription = 0;
        $user->save();

        // Send Email to all users

        // Prepare email data
        $mailData['name'] = $this->name;
        $mailData['last_seen'] = $this->last_seen;
        $mailData['images'] = $this->images;
        $mailData['gender'] = $this->gender;
        $mailData['address'] = $this->address;
        $mailData['microchip_id'] = $this->microchip_id;
        $mailData['medicine_info'] = $this->medicine_info;
        $mailData['description'] = $this->description;
        
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
        $users = User::all(); // Get all users
        $message = 'Hi! this is from chasetail testing. Let me know if you get this message.';

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $fromNumber = env('TWILIO_FROM');

        $successCount = 0;
        $errorCount = 0;
        $errors = [];

        foreach ($users as $user) {
            $receiverNumber = $user->phone;

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

        return $resultMessage;

        return $this->redirect('/user/dashboard', navigate: true);
        session()->flash('success', 'Report posted added successfully');
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->user_id = null;
        $this->longitude = null;
        $this->photos = null;
        $this->name = null;
        $this->gender = null;
        $this->last_seen = null;
        $this->microchip_id = null;
        $this->medicine_info = null;
        $this->description = null;
    }

    public function render()
    {
        return view('livewire.app.lost-dog-report.lost-report-step-three-component')->layout('livewire.app.layouts.base');
    }
}
