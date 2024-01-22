<?php

namespace App\Livewire\App\User\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;

class ForgotPasswordComponent extends Component
{
    #[Title('Forget Password')]
    public function render()
    {
        return view('livewire.app.user.auth.forgot-password-component')->layout('livewire.app.layouts.base');
    }
}
