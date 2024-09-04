<?php

namespace App\Livewire\App\Profile;

use Livewire\Component;

class PersonalInfoComponent extends Component
{
    public function render()
    {
        return view('livewire.app.profile.personal-info-component')->layout('livewire.app.layouts.base');;
    }
}
