<?php

namespace App\Livewire\App\Subscription;

use Livewire\Component;

class SubscriptionSuccessComponent extends Component
{
    public $transaction_id, $amount;
    public function mount($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    public function render()
    {
        return view('livewire.app.subscription.subscription-success-component')->layout('livewire.app.layouts.base');
    }
}
