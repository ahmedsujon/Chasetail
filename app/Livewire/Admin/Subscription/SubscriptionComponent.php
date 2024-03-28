<?php

namespace App\Livewire\Admin\Subscription;

use Livewire\Component;
use App\Models\Subscription;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubscriptionExportComponent;

class SubscriptionComponent extends Component
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

    public function subscriptionExcel()
    {
        return Excel::download(new SubscriptionExportComponent, 'subscription-list.xlsx');
    }

    public function subscriptionCSV()
    {
        return Excel::download(new SubscriptionExportComponent, 'subscription-list.csv');
    }

    public function render()
    {
        $subscriptions = Subscription::where('amount', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.subscription.subscription-component', ['subscriptions' => $subscriptions])->layout('livewire.admin.layouts.base');
    }
}
