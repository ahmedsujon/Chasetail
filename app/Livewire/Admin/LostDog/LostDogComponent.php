<?php

namespace App\Livewire\Admin\LostDog;

use App\Models\LostDog;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class LostDogComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm, $sortBy = 'created_at', $sortDirection = 'DESC';
    public $edit_id, $delete_id, $missing_status;


    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function changeStatus($id)
    {
        $lost_dog = LostDog::find($id);
        if ($lost_dog->status == 0) {
            $lost_dog->status = 1;
        } else {
            $lost_dog->status = 0;
        }
        $lost_dog->save();
        $this->dispatch('success', ['message' => 'Status updated successfully']);
    }

    public function changeMissingStatus()
    {
        $this->validate([
            'missing_status' => 'required',
        ]);

        $user = LostDog::find($this->edit_id);
        $user->missing_status = $this->missing_status;
        $user->save();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'Status updated successfully']);
    }

    public function deleteData()
    {
        $admin = LostDog::find($this->delete_id);
        $admin->delete();
        $this->dispatch('lost_dog_deleted');
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

    public function updateSearch()
    {
        $this->resetPage();
    }

    #[Title('Lost Dogs')]
    public function render()
    {
        $lost_dogs = LostDog::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.lost-dog.lost-dog-component', ['lost_dogs' => $lost_dogs])->layout('livewire.admin.layouts.base');
    }
}
