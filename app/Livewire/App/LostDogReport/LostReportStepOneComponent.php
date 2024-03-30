<?php

namespace App\Livewire\App\LostDogReport;

use Livewire\Component;

class LostReportStepOneComponent extends Component
{
    public function render()
    {
        return view('livewire.app.lost-dog-report.lost-report-step-one-component')->layout('livewire.app.layouts.base');
    }
}
