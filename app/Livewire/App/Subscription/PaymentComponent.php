<?php

namespace App\Livewire\App\Subscription;

use Livewire\Component;

class PaymentComponent extends Component
{
    public $multiple_image = 1;

    public function mount()
    {
        if (session('plan') == 'PlanA') {
            $this->multiple_image = 0;
        } else {
            $this->multiple_image = 1;
        }
    }

    public function render()
    {
        return view('livewire.app.subscription.payment-component')->layout('livewire.app.layouts.base');
    }
}
