<?php

namespace App\Livewire\App\User\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;

class UpdatePasswordComponent extends Component
{
    #[Title('Update Password')]
    public function render()
    {
        return view('livewire.app.user.auth.update-password-component')->layout('livewire.app.layouts.base');
    }
}
