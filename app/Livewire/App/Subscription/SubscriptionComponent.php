<?php

namespace App\Livewire\App\Subscription;

use Livewire\Component;

class SubscriptionComponent extends Component
{
    public function subscriptionEvent($price, $plan)
    {
        session()->put('plan_price', $price);
        session()->put('plan', $plan);

        if ($plan = "PlanA") {
            return redirect()->route('text.plan.report');
        } elseif ($plan = "PlanB") {
            return redirect()->route('plan.one.report');
        } elseif ($plan = "PlanC") {
            return redirect()->route('plan.two.report');
        } elseif ($plan = "PlanD") {
            return redirect()->route('plan.three.report');
        } else {
            return redirect()->route('plan.four.report');
        }
        // return redirect()->route('app.text.plan.report');
    }

    public function render()
    {
        return view('livewire.app.subscription.subscription-component')->layout('livewire.app.layouts.base');
    }
}
