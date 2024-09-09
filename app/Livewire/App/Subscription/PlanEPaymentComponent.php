<?php

namespace App\Livewire\App\Subscription;

use Livewire\Component;

class PlanEPaymentComponent extends Component
{
    public $multiple_image = 1;
    
    public function render()
    {
        return view('livewire.app.subscription.plan-e-payment-component')->layout('livewire.app.layouts.base');
    }
}
