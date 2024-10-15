<?php

namespace App\Livewire\App\PlanB;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PlanBStepTwoComponent extends Component
{

    public $user_id, $name, $last_seen, $gender, $color, $breed, $marking, $description, $medicine_info;

    public $characterCount = 0;
    public $maxCharacters = 200;

    public function updatedDescription()
    {
        $this->characterCount = strlen($this->description);
    }

    public function planBStepThree()
    {
        $this->validate([
            'name' => 'required',
            'last_seen' => 'required',
            'gender' => 'required',
            'color' => 'required',
            'breed' => 'required',
        ]);

        session()->put('name', $this->name);
        session()->put('last_seen', $this->last_seen);
        session()->put('gender', $this->gender);
        session()->put('color', $this->color);
        session()->put('breed', $this->breed);
        session()->put('marking', $this->marking);
        session()->put('description', $this->description);
        session()->put('medicine_info', $this->medicine_info);

        if (Auth::check()) {
            return $this->redirect('/level-one-subscription-payment', navigate: false);
        } else {
            return $this->redirect('/account-informations', navigate: false);
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'last_seen' => 'required',
            'gender' => 'required',
            'color' => 'required',
            'breed' => 'required',
            'marking' => 'required',
            'description' => 'required',
            'medicine_info' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.app.plan-b.plan-b-step-two-component')->layout('livewire.app.layouts.base');
    }
}
