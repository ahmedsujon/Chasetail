<?php

namespace App\Livewire\App\Subscription;

use Livewire\Component;

class PlanCPaymentComponent extends Component
{
    public $multiple_image = 0;

    public function render()
    {
        return view('livewire.app.subscription.plan-c-payment-component')->layout('livewire.app.layouts.base');
    }
}
