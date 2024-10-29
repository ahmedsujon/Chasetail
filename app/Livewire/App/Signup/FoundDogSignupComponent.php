<?php

namespace App\Livewire\App\Signup;

use App\Models\User;
use Livewire\Component;
use App\Models\FoundDog;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;

class FoundDogSignupComponent extends Component
{
    public $name, $username, $email, $phone, $found_date, $password, $confirm_password, $notify_status, $latitude, $longitude;

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
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|max:30',
            'confirm_password' => 'required|min:8|max:30|same:password',
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
        $user->notify_status = $this->notify_status;
        $user->save();

        // Create LostDog entry using session data
        $data = new FoundDog();
        $data->latitude = session('latitude');
        $data->longitude = session('longitude');
        $data->images = session('images');
        $data->address = session('address');
        $data->name = session('name');
        $data->breed = session('breed');
        $data->color = session('color');
        $data->marking = session('marking');
        $data->gender = session('gender');
        $data->found_date = session('found_date');
        $data->description = session('description');
        $data->user_id = $user->id;
        $data->save();

        // Flash success message and redirect
        session()->flash('success', 'Report posted successfully!');
        return redirect('/found-dogs');
    }

    #[Title('Account Information')]

    public function render()
    {
        return view('livewire.app.signup.found-dog-signup-component')->layout('livewire.app.layouts.base');
    }
}
