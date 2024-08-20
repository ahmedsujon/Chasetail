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

        $user = new User();
        $user->name = $this->name;
        $user->latitude = $this->latitude;
        $user->longitude = $this->longitude;
        $user->email = $this->email;
        $user->phone = $phone;
        $user->notify_status = $this->notify_status;
        $user->password = Hash::make($this->password);
        $user->avatar = 'assets/images/avatar.png';
        $user->save();

        Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);
        session()->flash('success', 'Registration successful');
        return redirect()->route('app.phone.verfy');
    }

    #[Title('Sign Up')]
    public function render()
    {
        return view('livewire.app.user.auth.register-component')->layout('livewire.app.layouts.base');
    }
}
