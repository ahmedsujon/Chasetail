<?php

namespace App\Livewire\App\FoundDog;

use Livewire\Component;
use App\Models\FoundDog;
use Livewire\WithPagination;

class FoundDogComponent extends Component
{
    use WithPagination;
    public $sortingValue = 12, $searchTerm, $searchByGenderTerm, $searchByColorTerm;
    public function render()
    {


        $found_dogs = FoundDog::where('name', 'like', '%' . $this->searchTerm . '%')

        ->when($this->searchByGenderTerm !== null && $this->searchByGenderTerm !== '', function ($query) {
            return $query->where('gender', $this->searchByGenderTerm);
        })

        ->when($this->searchByColorTerm !== null && $this->searchByColorTerm !== '', function ($query) {
            return $query->where('color', $this->searchByColorTerm);
        })

        ->inRandomOrder()->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');

        return view('livewire.app.found-dog.found-dog-component', ['found_dogs'=>$found_dogs])->layout('livewire.app.layouts.base');
    }
}
