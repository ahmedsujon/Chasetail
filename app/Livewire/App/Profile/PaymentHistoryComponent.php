<?php

namespace App\Livewire\App\Profile;

use Livewire\Component;
use App\Models\Subscription;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PaymentHistoryComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;

    public function render()
    {
        $transections = Subscription::where('user_id', Auth::user()->id)->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.app.profile.payment-history-component', ['transections'=>$transections])->layout('livewire.app.layouts.base');;
    }
}
