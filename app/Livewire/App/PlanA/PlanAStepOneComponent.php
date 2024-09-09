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
    public $user_id, $name, $last_seen, $gender, $color, $breed, $marking, $description, $medicine_info;

    public $characterCount = 0;
    public $maxCharacters = 100;

    public function updatedDescription()
    {
        $this->characterCount = strlen($this->description);
    }

    public function lostDogReportTwo()
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
        return $this->redirect('/text-plan-subscription-payment', navigate: true);
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
        return view('livewire.app.plan-a.plan-a-step-one-component')->layout('livewire.app.layouts.base');
    }
}
