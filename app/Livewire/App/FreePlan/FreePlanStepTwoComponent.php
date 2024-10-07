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
