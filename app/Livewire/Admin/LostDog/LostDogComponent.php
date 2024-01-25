<?php

namespace App\Livewire\Admin\LostDog;

use Livewire\Component;

class LostDogComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.lost-dog.lost-dog-component')->layout('livewire.admin.layouts.base');
    }
}
