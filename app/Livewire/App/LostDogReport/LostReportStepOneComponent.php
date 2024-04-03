<?php

namespace App\Livewire\App\LostDogReport;

use Livewire\Component;

class LostReportStepOneComponent extends Component
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
        return $this->redirect('/lost-dog-report-seceond', navigate: true);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'longitude' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.app.lost-dog-report.lost-report-step-one-component')->layout('livewire.app.layouts.base');
    }
}
