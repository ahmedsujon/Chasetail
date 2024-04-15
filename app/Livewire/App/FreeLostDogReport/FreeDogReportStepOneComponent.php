<?php

namespace App\Livewire\App\FreeLostDogReport;

use Livewire\Component;

class FreeDogReportStepOneComponent extends Component
{
    public $longitude;
    public function lostDogReportOne()
    {
        $this->validate([
            'longitude' => 'required',
        ], [
            'longitude.required' => 'Location field is required',
        ]);

        session()->put('longitude', $this->longitude);
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
