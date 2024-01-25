<?php

namespace App\Livewire\Admin\FoundDog;

use Livewire\Component;
use App\Models\FoundDog;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class FoundDogComponent extends Component
{
    use WithPagination;
    #[Url('history:true')]
    public $sortingValue = 10, $searchTerm, $sortBy = 'created_at', $sortDirection = 'DESC';
    public $edit_id, $delete_id;
    
    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $admin = FoundDog::find($this->delete_id);
        $admin->delete();
        $this->dispatch('admin_deleted');
        $this->delete_id = '';
    }

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDirection = ($this->sortDirection ==  "ASC") ? 'DESC' : "ASC";
            return;
        }
        $this->sortBy = $sortByField;
        $this->sortDirection = 'DESC';
    }

    public function updateSearch(){
        $this->resetPage();
    }

    #[Title('Found Dogs')]
    public function render()
    {
        $found_dogs = FoundDog::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.found-dog.found-dog-component', ['found_dogs'=>$found_dogs])->layout('livewire.admin.layouts.base');
    }
}
