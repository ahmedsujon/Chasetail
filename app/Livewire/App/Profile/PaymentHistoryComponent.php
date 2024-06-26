<?php

namespace App\Livewire\App\Profile;

use Livewire\Component;

class PaymentHistoryComponent extends Component
{
    public function render()
    {
        return view('livewire.app.profile.payment-history-component')->layout('livewire.app.layouts.base');;
    }
}
