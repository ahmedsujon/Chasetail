<?php

namespace App\Livewire\App\LostDog;

use App\Models\LostDog;
use Livewire\Component;

class LostDogDetailsComponent extends Component
{

    public $lost_dog;

    public function mount($id)
    {
        $lost_dog = LostDog::where('id', $id)->first();
        $this->lost_dog = $lost_dog;
    }

    public function render()
    {
        return view('livewire.app.lost-dog.lost-dog-details-component')->layout('livewire.app.layouts.base');
    }
}
