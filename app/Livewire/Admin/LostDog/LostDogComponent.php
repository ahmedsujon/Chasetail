<?php

namespace App\Livewire\Admin\LostDog;

use App\Models\LostDog;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LostDogExportComponent;

class LostDogComponent extends Component
{
    use WithPagination;

    public $sortingValue = 10, $searchTerm, $searchTermGender, $searchTermMissingSatus, $sortBy = 'created_at', $sortDirection = 'DESC';

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

    public function editMissingStatusData($id)
    {
        $data = LostDog::find($id);
        $this->missing_status = $data->missing_status;
        $this->edit_id = $data->id;
        $this->dispatch('showEditModal');
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

    public function exportLostDogsExcel()
    {
        return Excel::download(new LostDogExportComponent, 'lost-dog-list.xlsx');
    }

    public function exportLostDogsCSV()
    {
        return Excel::download(new LostDogExportComponent, 'lost-dog-list.csv');
    }

    // public function exportLostDogsPDF()
    // {
    //     return Excel::download(new LostDogExportComponent, 'lost-dog-list.pdf');
    // }

    #[Title('Lost Pets')]
    public function render()
    {
        $lost_dogs = LostDog::where('name', 'like', '%' . $this->searchTerm . '%')

            ->when($this->searchTermGender !== null && $this->searchTermGender !== '', function ($query) {
                return $query->where('gender', $this->searchTermGender);
            })

            ->when($this->searchTermMissingSatus !== null && $this->searchTermMissingSatus !== '', function ($query) {
                return $query->where('missing_status', $this->searchTermMissingSatus);
            })

            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.lost-dog.lost-dog-component', ['lost_dogs' => $lost_dogs])->layout('livewire.admin.layouts.base');
    }
}
