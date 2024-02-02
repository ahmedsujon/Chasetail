<?php

namespace App\Livewire\App\ContactUs;

use Livewire\Component;

class ContactUsComponent extends Component
{
    public function render()
    {
        return view('livewire.app.contact-us.contact-us-component')->layout('livewire.app.layouts.base');
    }
}
