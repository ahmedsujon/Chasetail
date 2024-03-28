<?php

namespace App\Livewire\Admin\Donation;

use App\Exports\DonationExportComponent;
use Livewire\Component;
use App\Models\Donation;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class DonationComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm, $sortBy = 'created_at', $sortDirection = 'DESC';
    public $edit_id, $delete_id, $missing_status;

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

    public function donationExcel()
    {
        return Excel::download(new DonationExportComponent, 'donation-list.xlsx');
    }

    public function donationCSV()
    {
        return Excel::download(new DonationExportComponent, 'donation-list.csv');
    }

    public function render()
    {
        $donations = Donation::where('amount', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.donation.donation-component', ['donations' => $donations])->layout('livewire.admin.layouts.base');
    }
}
