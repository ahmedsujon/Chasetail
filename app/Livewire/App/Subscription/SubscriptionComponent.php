<?php

namespace App\Livewire\App\Subscription;

use Livewire\Component;

class SubscriptionComponent extends Component
{
    public function subscriptionEvent($price, $plan)
    {
        session()->put('plan_price', $price);
        session()->put('plan', $plan);
        return redirect()->route('app.payment');
    }

    public function render()
    {
        return view('livewire.app.subscription.subscription-component')->layout('livewire.app.layouts.base');
    }
}
