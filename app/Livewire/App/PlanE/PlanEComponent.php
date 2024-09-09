<?php

namespace App\Livewire\App\PlanE;

use Livewire\Component;

class PlanEComponent extends Component
{
    public $latitude, $longitude, $address, $plan_price;

    public function planEStepOne()
    {
        $this->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ], [
            'latitude.required' => 'Location field is required',
            'longitude.required' => 'Location field is required',
        ]);

        session()->put('latitude', $this->latitude);
        session()->put('longitude', $this->longitude);
        session()->put('address', $this->address);
        session()->put('plan_price', 239);
        session()->put('plan', 'PlanE');
        return $this->redirect('/free-plan-report-step-two', navigate: true);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.app.plan-e.plan-e-component')->layout('livewire.app.layouts.base');
    }
}
