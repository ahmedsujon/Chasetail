<?php

namespace App\Livewire\App\PlanB;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class PlanBStepOneComponent extends Component
{
    use WithFileUploads;
    public $images, $uploadedImage;

    public function planBStepTwo()
    {
        $this->validate([
            'images' => 'required',
        ], [
            'images.required' => 'Image field is required',
        ]);

        if ($this->images) {
            $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->images->extension();
            $this->images->storeAs('images', $fileName);
            $uploadedImages = 'uploads/images/' . $fileName;
            session()->put('images', $uploadedImages);
        }
        return $this->redirect('/plan-one-report-step-three', navigate: true);
    }

    public function render()
    {
        return view('livewire.app.plan-b.plan-b-step-one-component')->layout('livewire.app.layouts.base');
    }
}
