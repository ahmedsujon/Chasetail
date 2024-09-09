<?php

namespace App\Livewire\App\PlanD;

use Livewire\Component;

class PlanDComponent extends Component
{
    public $latitude, $longitude, $address, $plan_price;

    public function planDStepOne()
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
        session()->put('plan_price', 199);
        session()->put('plan', 'PlanD');
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
        return view('livewire.app.plan-d.plan-d-component')->layout('livewire.app.layouts.base');
    }
}
