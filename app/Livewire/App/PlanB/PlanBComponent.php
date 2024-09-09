<?php

namespace App\Livewire\App\PlanB;

use Livewire\Component;

class PlanBComponent extends Component
{
    public $latitude, $longitude, $address;

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
        return $this->redirect('/plan-two-report-step-two', navigate: true);
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
        return view('livewire.app.plan-b.plan-b-component')->layout('livewire.app.layouts.base');
    }
}
