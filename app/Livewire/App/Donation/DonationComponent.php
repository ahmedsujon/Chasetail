<?php

namespace App\Livewire\App\Donation;

use Livewire\Component;

class DonationComponent extends Component
{
    public function render()
    {
        return view('livewire.app.donation.donation-component')->layout('livewire.app.layouts.base');
    }
}
