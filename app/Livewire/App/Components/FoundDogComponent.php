<?php

namespace App\Livewire\App\Components;

use App\Models\FoundDog;
use Livewire\Component;

class FoundDogComponent extends Component
{

    public function placeholder()
    {
        return view('livewire.app.placeholders.found-dog');
    }
    public function render()
    {
        sleep(5);
        $found_dogs = FoundDog::orderBy("created_at","desc")->take(5)->get();
        return view('livewire.app.components.found-dog-component', ['found_dogs'=>$found_dogs])->layout('livewire.app.layouts.base');
    }
}
