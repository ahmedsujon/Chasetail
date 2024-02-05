<?php

namespace App\Livewire\App\FoundDog;

use Livewire\Component;
use App\Models\FoundDog;
use Livewire\WithPagination;

class FoundDogComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public function render()
    {
        $found_dogs = FoundDog::where('name', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.app.found-dog.found-dog-component', ['found_dogs'=>$found_dogs])->layout('livewire.app.layouts.base');
    }
}
