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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterComponent extends Component
{
    public $name, $username, $email, $phone, $password, $confirm_password, $notify_status = 1, $latitude, $longitude, $verification_code_input;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|max:30',
            'confirm_password' => 'required|min:8|max:30|same:password',
        ]);
    }

    public function userRegistration()
    {
        // Step 1: Validate form data
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|max:30',
            'confirm_password' => 'required|min:8|max:30|same:password',
        ]);

        // Step 2: Generate a verification code
        $verificationCode = rand(100000, 999999);

        // Step 3: Prepare data for the email
        $mailData = [
            'name' => $this->name,
            'verification_code' => $verificationCode,
        ];

        // Step 4: Send email with the verification code
        Mail::send('emails.register_verification_code', $mailData, function ($message) {
            $message->to($this->email)
                ->subject('Your Verification Code');
        });

        // Step 5: Store verification code and user data temporarily in the session
        session()->put('registration_data', [
            'name' => $this->name,
            'email' => $this->email,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'phone' => '+1' . preg_replace('/[^\d]/', '', $this->phone),
            'password' => Hash::make($this->password),
            'verification_code' => $verificationCode,
        ]);

        // Flash success message to inform user about the verification code
        session()->flash('success', 'A verification code has been sent to your email.');
    }

    public function verifyCode()
    {
        // Retrieve registration data from session
        $registrationData = session('registration_data');

        // Check if verification code matches
        if ($registrationData && $this->verification_code_input == $registrationData['verification_code']) {
            // Code matches, create the user
            $user = new User();
            $user->name = $registrationData['name'];
            $user->email = $registrationData['email'];
            $user->latitude = $registrationData['latitude'];
            $user->longitude = $registrationData['longitude'];
            $user->phone = $registrationData['phone'];
            $user->password = $registrationData['password'];
            $user->save();

            // Clear the session data
            session()->forget('registration_data');

            // Flash success message and redirect
            session()->flash('success', 'Your account has been successfully created.');
            return redirect('/user/dashboard');
        } else {
            // If code does not match, show an error message
            session()->flash('error', 'Invalid verification code.');
        }
    }


    #[Title('Sign Up')]
    public function render()
    {
        return view('livewire.app.user.auth.register-component')->layout('livewire.app.layouts.base');
    }
}
