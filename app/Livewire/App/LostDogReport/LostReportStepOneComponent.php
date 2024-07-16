<?php

namespace App\Livewire\App\LostDogReport;

use Livewire\Component;

class LostReportStepOneComponent extends Component
{

    public $longitude;
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
        return $this->redirect('/lost-dog-report-seceond', navigate: true);
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
        return view('livewire.app.lost-dog-report.lost-report-step-one-component')->layout('livewire.app.layouts.base');
    }
}
