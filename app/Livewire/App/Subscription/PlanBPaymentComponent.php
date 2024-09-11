<?php

namespace App\Livewire\App\Subscription;

use Livewire\Component;

class PlanBPaymentComponent extends Component
{

    public $multiple_image = 0;

    public function render()
    {
        return view('livewire.app.subscription.plan-b-payment-component')->layout('livewire.app.layouts.base');
    }
}
