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

        // Clean phone number
        $phone = '+1' . preg_replace('/[^\d]/', '', $this->phone);
        // Create new user instance and save
        $user = new User();
        $user->name = $this->name;
        $user->latitude = $this->latitude;
        $user->longitude = $this->longitude;
        $user->email = $this->email;
        $user->phone = $phone;
        $user->password = Hash::make($this->password);
        $user->subscription = 0;
        $user->save();

        // Create LostDog entry using session data
        $data = new LostDog();
        $data->latitude = session('latitude');
        $data->longitude = session('longitude');
        $data->images = session('images');
        $data->address = session('address');
        $data->payment_status = 'free';
        $data->name = session('name');
        $data->breed = session('breed');
        $data->color = session('color');
        $data->marking = session('marking');
        $data->gender = session('gender');
        $data->last_seen = session('last_seen');
        $data->description = session('description');
        $data->notify_status = $this->notify_status;
        $data->user_id = $user->id;
        $data->save();

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
