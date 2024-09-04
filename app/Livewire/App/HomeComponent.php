<?php

namespace App\Livewire\App;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeComponent extends Component
{

    public $subscription;

    #[Title('Home Page')]
    public function render()
    {
        return view('livewire.app.home-component')->layout('livewire.app.layouts.base');
    }
}
