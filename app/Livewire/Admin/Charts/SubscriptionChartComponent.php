<?php

namespace App\Livewire\Admin\Charts;

use App\Models\Subscription;
use Livewire\Component;

class SubscriptionChartComponent extends Component
{
    public $subscriptions;

    public function mount()
    {
        $data = [];
        
        $subscriptions = Subscription::latest()->get();
        foreach ($subscriptions as $subscription) {
            $data['label'][] = $subscription->created_at->format('H:i:s');
            $data['data'][] = (int)$subscription->amount;
        }
        $this->subscriptions = json_encode($data);
    }

    public function render()
    {
        return view('livewire.admin.charts.subscription-chart-component')->layout('livewire.admin.layouts.base');
    }
}
