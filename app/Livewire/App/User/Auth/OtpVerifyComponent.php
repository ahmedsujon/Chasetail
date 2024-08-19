<?php

namespace App\Livewire\App\User\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class OtpVerifyComponent extends Component
{

    public $otp;

    public function verifyOtp()
    {
        $storedOtp = Session::get('otp');

        if ($this->otp == $storedOtp) {
            // OTP is correct, proceed with registration logic
            Session::forget('otp');
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
