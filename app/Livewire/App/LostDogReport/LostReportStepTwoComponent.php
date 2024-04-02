<?php

namespace App\Livewire\App\LostDogReport;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class LostReportStepTwoComponent extends Component
{
    use WithFileUploads;
    public $images, $uploadedImage;
    public function lostDogReportTwo()
    {
        if ($this->images) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->images->extension();
            $this->images->storeAs('images', $fileName);
            $uploadedImages = 'uploads/images/' . $fileName;
            session()->put('images', $uploadedImages);
        }

        return $this->redirect('/lost-dog-report-third', navigate: true);
    }

    public function render()
    {
        return view('livewire.app.lost-dog-report.lost-report-step-two-component')->layout('livewire.app.layouts.base');
    }
}
