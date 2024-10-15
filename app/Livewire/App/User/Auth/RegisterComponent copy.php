<?php

namespace App\Livewire\App\User\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Session;

class RegisterComponent extends Component
{
    public $name, $username, $email, $phone, $password, $confirm_password, $notify_status, $latitude, $longitude;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
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
            'confirm_password' => 'required|min:8|same:password',
            'notify_status' => 'required',
        ]);

        // Generate a 6-digit OTP code
        $otp = rand(100000, 999999);
        // Store the OTP in the session for later verification
        Session::put('otp', $otp);

        // Clean the phone number and add +1
        $phone = '+1' . preg_replace('/[^\d]/', '', $this->phone);

        // Send OTP using Twilio
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $twilio->messages->create($phone, [
            'from' => env('TWILIO_FROM'),
            'body' => "Your OTP code is: $otp"
        ]);

        // Store user data in the session instead of the database
        Session::put('user_registration_data', [
            'name' => $this->name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'email' => $this->email,
            'phone' => $phone,
            'password' => Hash::make($this->password),
            'avatar' => 'assets/images/avatar.png',
        ]);

        Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);
        session()->flash('success', 'Registration successful');
        return redirect()->route('user.dashboard');
    }

    #[Title('Sign Up')]
    public function render()
    {
        return view('livewire.app.user.auth.register-component')->layout('livewire.app.layouts.base');
    }
}
