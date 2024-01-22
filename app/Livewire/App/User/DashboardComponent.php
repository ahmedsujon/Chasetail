<?php

namespace App\Livewire\App\User;

use Livewire\Component;
use Livewire\Attributes\Title;

class DashboardComponent extends Component
{
    #[Title('Dashboard')]
    public function render()
    {
        return view('livewire.app.user.dashboard-component')->layout('livewire.app.layouts.base');;
    }
}
