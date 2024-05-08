<?php

namespace App\Livewire\App\FoundDogReport;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class FoundDogReportStepTwoComponent extends Component
{

    use WithFileUploads;
    public $images, $uploadedImage;

    public function lostDogReportTwo()
    {
        $this->validate([
            'images' => 'required',
        ], [
            'images.required' => 'Image field is required',
        ]);

        if ($this->images) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->images->extension();
            $this->images->storeAs('founddogs', $fileName);
            $uploadedImages = 'uploads/founddogs/' . $fileName;
            session()->put('images', $uploadedImages);
        }

        return $this->redirect('/found/dog/report/third/step', navigate: true);
    }

    public function render()
    {
        return view('livewire.app.found-dog-report.found-dog-report-step-two-component')->layout('livewire.app.layouts.base');
    }
}
