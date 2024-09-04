<?php

namespace App\Livewire\App\FoundDog;

use App\Models\FoundDog;
use Livewire\Component;

class FoundDogDetailsComponent extends Component
{

    public $found_dog;

    public function mount($id)
    {
        $found_dog = FoundDog::where('id', $id)->first();
        $this->found_dog = $found_dog;
    }

    public function render()
    {
        return view('livewire.app.found-dog.found-dog-details-component')->layout('livewire.app.layouts.base');
    }
}
