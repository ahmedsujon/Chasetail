<?php

namespace App\Livewire\App\LostDog;

use App\Models\LostDog;
use Livewire\Component;
use Livewire\WithPagination;

class LostDogComponent extends Component
{
    use WithPagination;
    public $sortingValue = 12, $searchTerm;

    public function render()
    {
        $lost_dogs = LostDog::where('name', 'like', '%' . $this->searchTerm . '%')->inRandomOrder()->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.app.lost-dog.lost-dog-component', ['lost_dogs' => $lost_dogs])->layout('livewire.app.layouts.base');
    }
}
