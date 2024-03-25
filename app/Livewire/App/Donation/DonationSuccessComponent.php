<?php

namespace App\Livewire\App\Donation;

use Livewire\Component;

class DonationSuccessComponent extends Component
{
    public $transaction_id;
    public function mount($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    public function render()
    {
        return view('livewire.app.donation.donation-success-component')->layout('livewire.app.layouts.base');
    }
}
