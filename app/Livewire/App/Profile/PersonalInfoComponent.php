<?php

namespace App\Livewire\App\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class PersonalInfoComponent extends Component
{
    public $edit_id, $name, $email, $phone, $password, $confirm_password, $latitude, $longitude, $address;

    public function mount($id)
    {
        $data = User::where('id', $id)->first();
        $this->edit_id = $id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->phone = $data->phone;
        $this->address = $data->address;
        $this->latitude = $data->latitude ?? null; // Initialize if needed
        $this->longitude = $data->longitude ?? null; // Initialize if needed
    }

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->edit_id,
            // 'phone' => 'required|unique:users,phone,' . $this->edit_id,
            'password' => 'sometimes|nullable|min:8|max:30',
            'confirm_password' => 'sometimes|nullable|min:8|max:30|same:password',
        ]);

        // Clean phone number
        $phone = '+1' . preg_replace('/[^\d]/', '', $this->phone);
        $user = User::find($this->edit_id);
        $user->name = $this->name;
        $user->latitude = $this->latitude;
        $user->longitude = $this->longitude;
        $user->address = $this->address;
        $user->email = $this->email;
        $user->phone = $phone;

        // Only update password if it's provided
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }
        $user->save();
        session()->flash('success', 'Personal information updated successfully!');
    }


    public function render()
    {
        return view('livewire.app.profile.personal-info-component')->layout('livewire.app.layouts.base');;
    }
}
