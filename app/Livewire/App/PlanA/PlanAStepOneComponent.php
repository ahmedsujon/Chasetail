<?php

namespace App\Livewire\App\PlanA;

use App\Models\User;
use App\Models\LostDog;
use Livewire\Component;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PlanAStepOneComponent extends Component
{
    public $user_id, $id, $breed, $medicine_info, $payment_status, $address, $longitude, $photos, $images,
    $name, $gender, $last_seen, $microchip_id, $description, $marking, $color;

    public $characterCount = 0;
    public $maxCharacters = 100;

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

        $data->name = $this->name;
        $data->breed = $this->breed;
        $data->color = $this->color;
        $data->marking = $this->marking;
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

        $users = DB::table('users')->select('id', 'latitude', 'longitude')->where('id', '!=', Auth::user()->id)->get();
        // Initialize an array to hold users with their distances
        $usersWithDistances = [];
        foreach ($users as $user) {
            if (isset($data->latitude) && isset($data->longitude)) {
                $distance = getDistance($data->latitude, $data->longitude, $user->latitude, $user->longitude);
                // Store the user ID and its distance
                if ($distance <= 10) {
                    $usersWithDistances[] = [
                        'user_id' => $user->id,
                        'distance' => $distance,
                    ];
                }
            }
        }
        // Sort the users by distance
        usort($usersWithDistances, function ($a, $b) {
            return $a['distance'] <=> $b['distance'];
        });

        // Get the nearest users
        $nearest = 250;
        $nearestUsers = array_slice($usersWithDistances, 0, $nearest);
        // Extract the user IDs of the nearest 50 users
        $userIds = array_column($nearestUsers, 'user_id');

        // Get all users' emails
        $author_emails = User::whereIn('id', $userIds)->pluck('email')->toArray();

        foreach ($author_emails as $email) {
            Mail::send('emails.text-plan-lostdog-report', $mailData, function ($message) use ($mailData, $email) {
                $message->to($email)
                    ->subject('Lost Dog Notification');
            });
        }

        // Send SMS to all users
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
        session()->forget(['latitude', 'longitude', 'images', 'address']);
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
        return view('livewire.app.plan-a.plan-a-step-one-component')->layout('livewire.app.layouts.base');
    }
}
