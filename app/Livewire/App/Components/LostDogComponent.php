<?php

namespace App\Livewire\App\Components;

use App\Models\LostDog;
use Livewire\Component;

class LostDogComponent extends Component
{
    public function render()
    {
        $lot_dogs = LostDog::orderBy("created_at","desc")->take(5)->get();
        return view('livewire.app.components.lost-dog-component', ['lot_dogs'=>$lot_dogs])->layout('livewire.app.layouts.base');
    }
}
