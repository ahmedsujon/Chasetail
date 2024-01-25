<?php

namespace App\Livewire\Admin\FoundDog;

use Livewire\Component;

class FoundDogComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.found-dog.found-dog-component')->layout('livewire.admin.layouts.base');
    }
}
