<?php

namespace App\Livewire\App\FoundDogReport;

use Livewire\Component;

class FoundDogReportStepOneComponent extends Component
{
    public $latitude, $longitude;
    public function lostDogReportOne()
    {
        $this->validate([
            'longitude' => 'required',
        ], [
            'longitude.required' => 'Location field is required',
        ]);

        session()->put('latitude', $this->latitude);
        session()->put('longitude', $this->longitude);
        return $this->redirect('/found/dog/report/seceond/step', navigate: true);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'longitude' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.app.found-dog-report.found-dog-report-step-one-component')->layout('livewire.app.layouts.base');
    }
}
