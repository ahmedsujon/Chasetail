<?php

namespace App\Livewire\App\Subscription;

use Livewire\Component;

class PaymentComponent extends Component
{
    public function render()
    {
        return view('livewire.app.subscription.payment-component')->layout('livewire.app.layouts.base');
    }
}
