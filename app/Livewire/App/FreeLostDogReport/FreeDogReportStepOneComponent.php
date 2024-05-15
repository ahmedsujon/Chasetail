<?php

namespace App\Livewire\App\FreeLostDogReport;

use Livewire\Component;

class FreeDogReportStepOneComponent extends Component
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
        return $this->redirect('/free-lost-dog-report-seceond', navigate: true);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'longitude' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.app.free-lost-dog-report.free-dog-report-step-one-component')->layout('livewire.app.layouts.base');
    }
}
