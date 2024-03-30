<?php

namespace App\Livewire\Admin\Charts;

use App\Models\Donation;
use Livewire\Component;

class DonationChartComponent extends Component
{
    public $donations;
    protected $listeners = ['liveChange' => 'liveUpdate'];

    public function mount()
    {
        $donations = Donation::latest()->get();
        foreach ($donations as $donation) {
            $data['label'][] = $donation->created_at->format('H:i:s');
            $data['data'][] = (int)$donation->amount;
        }
        $this->donations = json_encode($data);
    }

    public function liveUpdate()
    {
        $donations = Donation::latest()->get();
        foreach ($donations as $donation) {
            $data['label'][] = $donation->created_at->format('H:i:s');
            $data['data'][] = (int)$donation->amount;
        }
        $this->donations = json_encode($data);
        $this->emit('liveupdateData', ['data' => $this->donations]);
    }

    public function render()
    {
        return view('livewire.admin.charts.donation-chart-component')->layout('livewire.admin.layouts.base');
    }
}
