<?php

namespace App\Livewire\App\Signup;

use App\Models\User;
use App\Models\LostDog;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;

class PaidSignupComponent extends Component
{

    public $name, $username, $email, $phone, $password, $confirm_password, $notify_status, $latitude, $longitude;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|max:30',
        ]);
    }

    public function userRegistration()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        // Format the phone number by removing all non-digit characters
        $formattedPhone = '+1' . preg_replace('/[^\d]/', '', $this->phone);

        // Store the formatted phone number in the session
        session()->put('name', $this->name);
        session()->put('email', $this->email);
        session()->put('phone', $formattedPhone); // Use formatted phone number
        session()->put('password', $this->password);

        return $this->redirect('/text-plan-subscription-payment', navigate: false);
    }


    #[Title('Account Information')]
    public function render()
    {
        return view('livewire.app.signup.paid-signup-component')->layout('livewire.app.layouts.base');
    }
}
