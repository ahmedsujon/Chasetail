<?php

namespace App\Livewire\App\User\Auth;

use App\Models\User;
use App\Models\LostDog;
use Livewire\Component;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterComponent extends Component
{
    public $name, $username, $email, $phone, $password, $confirm_password, $notify_status, $latitude, $longitude;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|max:30',
            'confirm_password' => 'required|min:8|max:30|same:password',
            'notify_status' => 'required',
        ]);
    }

    public function userRegistration()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|max:30',
            'confirm_password' => 'required|min:8|max:30|same:password',
        ]);

        // Clean phone number
        $phone = '+1' . preg_replace('/[^\d]/', '', $this->phone);
        $user = new User();
        $user->name = $this->name;
        $user->latitude = $this->latitude;
        $user->longitude = $this->longitude;
        $user->email = $this->email;
        $user->phone = $phone;
        $user->password = Hash::make($this->password);
        $user->notify_status = $this->notify_status;
        $user->save();

        // Flash success message and redirect
        session()->flash('success', 'Report posted successfully!');
        return redirect('/user/dashboard');
    }

    #[Title('Sign Up')]
    public function render()
    {
        return view('livewire.app.user.auth.register-component')->layout('livewire.app.layouts.base');
    }
}
