<?php

namespace App\Livewire\Admin\FoundDog;

use Livewire\Component;
use App\Models\FoundDog;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FoundDogExportComponent;

class FoundDogComponent extends Component
{
    use WithPagination;
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
        $this->dispatch('found_dog_deleted');
        $this->delete_id = '';
    }

    public function changeStatus($id)
    {
        $category = FoundDog::find($id);
        if ($category->status == 0) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }
        $category->save();
        $this->dispatch('success', ['message' => 'Status updated successfully']);
    }

    public function changeMissingStatus($id)
    {
        $data = FoundDog::find($id);
        if ($data->missing_status == "Found") {
            $data->missing_status = "Rescued";
        } else {
            $data->missing_status = "Found";
        }
        $data->save();
        $this->dispatch('success', ['message' => 'Missing status updated successfully']);
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

    public function exportFoundDogsExcel()
    {
        return Excel::download(new FoundDogExportComponent, 'found-dog-list.xlsx');
    }

    public function exportFoundDogsCSV()
    {
        return Excel::download(new FoundDogExportComponent, 'found-dog-list.csv');
    }

    public function updateSearch()
    {
        $this->resetPage();
    }

    #[Title('Found Dogs')]
    public function render()
    {
        $found_dogs = FoundDog::where('gender', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.found-dog.found-dog-component', ['found_dogs' => $found_dogs])->layout('livewire.admin.layouts.base');
    }
}
