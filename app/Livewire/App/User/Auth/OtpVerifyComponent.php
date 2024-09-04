<?php

namespace App\Livewire\App\User\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class OtpVerifyComponent extends Component
{

    public $otp;

    public function verifyOtp()
    {
        $storedOtp = Session::get('otp');

        if ($this->otp == $storedOtp) {
            // OTP is correct, save the user to the database
            $userData = Session::get('user_registration_data'); // Retrieve user data from session

            if ($userData) {
                $user = new User();
                $user->name = $userData['name'];
                $user->latitude = $userData['latitude'];
                $user->longitude = $userData['longitude'];
                $user->email = $userData['email'];
                $user->phone = $userData['phone'];
                $user->password = $userData['password'];
                $user->avatar = $userData['avatar'];
                $user->save();
            }

            // Clear OTP and user data from the session
            Session::forget('otp');
            Session::forget('user_registration_data');

            return redirect()->route('user.dashboard');
        } else {
            // OTP is incorrect, return error message
            $this->addError('otp', 'The OTP you entered is incorrect.');
        }
    }


    public function render()
    {
        return view('livewire.app.user.auth.otp-verify-component')->layout('livewire.app.layouts.base');
    }
}
