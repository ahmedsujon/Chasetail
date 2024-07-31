<?php

namespace App\Livewire\App\FreeLostDogReport;

use App\Models\User;
use App\Models\LostDog;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FreeDogReportStepThreeComponent extends Component
{
    public $user_id, $breed, $medicine_info, $payment_status, $address, $longitude, $photos, $images, $name, $gender, $last_seen, $microchip_id, $description;

    public $wordCount = 0;
    public $maxWords = 150;

    public function updatedDescription()
    {
        $this->wordCount = str_word_count($this->description);
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
        return view('livewire.app.free-lost-dog-report.free-dog-report-step-three-component')->layout('livewire.app.layouts.base');
    }
}
