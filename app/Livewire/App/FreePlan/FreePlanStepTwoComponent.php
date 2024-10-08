<?php

namespace App\Livewire\App\FreePlan;

use App\Models\LostDog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FreePlanStepTwoComponent extends Component
{
    public $user_id, $id, $breed, $medicine_info, $payment_status, $address, $longitude, $photos, $images,
        $name, $gender, $last_seen, $microchip_id, $description, $marking, $color;

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
            'breed' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'last_seen' => 'required',
        ]);

        session()->put('name', $this->name);
        session()->put('breed', $this->breed);
        session()->put('color', $this->color);
        session()->put('marking', $this->marking);
        session()->put('gender', $this->gender);
        session()->put('last_seen', $this->last_seen);
        session()->put('description', $this->description);
        return $this->redirect('/account-information', navigate: false);
    }

    public function submitData()
    {
        $this->validate([
            'name' => 'required',
            'breed' => 'required',
            'color' => 'required',
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
        $data->description = $this->description;
        $data->save();

        $user = User::find(Auth::user()->id);
        $user->subscription = 0;
        $user->save();
        return $this->redirect('/lostdogs', navigate: true);
        session()->flash('success', 'Report posted successfully!');
        $this->resetInputs();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'breed' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'last_seen' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.app.free-plan.free-plan-step-two-component')->layout('livewire.app.layouts.base');
    }
}
