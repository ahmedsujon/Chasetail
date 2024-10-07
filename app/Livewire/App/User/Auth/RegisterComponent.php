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
    public $name, $username, $email, $phone, $password, $confirm_password, $notify_status, $latitude, $longitude,
        $subscription;

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
        // Validation
        $validatedData = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|max:30',
            'notify_status' => 'required',
        ]);

        // Format phone number and create new user
        $formattedPhone = '+1' . preg_replace('/[^\d]/', '', $validatedData['phone']);

        $user = User::create([
            'name' => $validatedData['name'],
            'latitude' => request()->input('latitude'),
            'longitude' => request()->input('longitude'),
            'email' => $validatedData['email'],
            'phone' => $formattedPhone,
            'password' => Hash::make($validatedData['password']),
            'subscription' => 0,
        ]);

        // Create a new LostDog entry
        LostDog::create([
            'latitude' => request()->input('latitude'),
            'longitude' => request()->input('longitude'),
            'images' => request()->input('images'),
            'address' => request()->input('address'),
            'payment_status' => 'free',
            'name' => request()->input('name'),
            'breed' => request()->input('breed'),
            'color' => request()->input('color'),
            'marking' => request()->input('marking'),
            'gender' => request()->input('gender'),
            'last_seen' => request()->input('last_seen'),
            'description' => request()->input('description'),
        ]);

        // Flash success message and redirect
        session()->flash('success', 'Report posted successfully!');
        return $this->redirect('/user/dashboard', navigate: true);
    }



    #[Title('Sign Up')]
    public function render()
    {
        return view('livewire.app.user.auth.register-component')->layout('livewire.app.layouts.base');
    }
}
