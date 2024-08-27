<?php

namespace App\Livewire\App\FreePlan;

use App\Models\LostDog;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Twilio\Rest\Client;

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
        return view('livewire.app.free-plan.free-plan-step-two-component')->layout('livewire.app.layouts.base');
    }
}
