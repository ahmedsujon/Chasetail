<?php

namespace App\Livewire\App\PlanE;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PlanEStepTwoComponent extends Component
{

    public $user_id, $name, $last_seen, $gender, $color, $breed, $marking, $description, $medicine_info;

    public $characterCount = 0;
    public $maxCharacters = 200;

    public function updatedDescription()
    {
        $this->characterCount = strlen($this->description);
    }

    public function planEStepThree()
    {
        $this->validate([
            'name' => 'required',
            'last_seen' => 'required',
            'gender' => 'required',
            'color' => 'required',
            'breed' => 'required',
        ]);

        session()->put('user_id', Auth::user()->id);
        session()->put('name', $this->name);
        session()->put('last_seen', $this->last_seen);
        session()->put('gender', $this->gender);
        session()->put('color', $this->color);
        session()->put('breed', $this->breed);
        session()->put('marking', $this->marking);
        session()->put('description', $this->description);
        session()->put('medicine_info', $this->medicine_info);
        return $this->redirect('/level-four-subscription-payment', navigate: true);
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
        return view('livewire.app.plan-e.plan-e-step-two-component')->layout('livewire.app.layouts.base');
    }
}
