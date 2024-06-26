<?php

namespace App\Livewire\App\Profile;

use Livewire\Component;

class MessageComponent extends Component
{
    public function render()
    {
        return view('livewire.app.profile.message-component')->layout('livewire.app.layouts.base');;
    }
}
