<?php

namespace App\Livewire\Admin\SpamReport;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\FoundReportListing;

class FoundPetSpamReportComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public $delete_id;

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $admin = FoundReportListing::find($this->delete_id);
        $admin->delete();
        $this->dispatch('report_deleted');
        $this->delete_id = '';
    }

    #[Title('Found Pet Report')]
    public function render()
    {
        $reports = FoundReportListing::where('id', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.spam-report.found-pet-spam-report-component', ['reports'=>$reports])->layout('livewire.admin.layouts.base');
    }
}
