<?php

namespace App\Livewire\App\Flyer;

use App\Models\LostDog;
use Livewire\Component;

class FlyerComponent extends Component
{

    public $lost_dog;

    public function mount($id)
    {
        $lost_dog = LostDog::where('id', $id)->first();
        $this->lost_dog = $lost_dog;
    }

    public function render()
    {
        return view('livewire.app.flyer.flyer-component')->layout('livewire.app.layouts.base');
    }
}
