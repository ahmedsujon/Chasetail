<?php

namespace App\Livewire\App\FreeLostDogReport;

use App\Models\User;
use App\Models\LostDog;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FreeDogReportStepThreeComponent extends Component
{
    public $user_id, $payment_status, $longitude, $photos, $name, $gender, $last_seen, $microchip_id, $description;

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
        $data->payment_status = 'free';
        $data->gender = $this->gender;
        $data->last_seen = $this->last_seen;
        $data->microchip_id = $this->microchip_id;
        $data->description = $this->description;
        $data->save();

        $user = User::find(Auth::user()->id);
        $user->subscription = 0;
        $user->save();

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
        $this->name = null;
        $this->gender = null;
        $this->last_seen = null;
        $this->microchip_id = null;
        $this->description = null;
    }

    public function render()
    {
        return view('livewire.app.free-lost-dog-report.free-dog-report-step-three-component')->layout('livewire.app.layouts.base');
    }
}
