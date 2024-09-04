<?php

namespace App\Livewire\App\PlanA;

use Livewire\Component;

class PlanAComponent extends Component
{
    public $latitude, $longitude, $address, $plan_price;

    public function lostDogReportOne()
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
        session()->put('plan_price', 99);
        return $this->redirect('/text-plan-report-step-two', navigate: true);
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
        return view('livewire.app.plan-a.plan-a-component')->layout('livewire.app.layouts.base');
    }
}
