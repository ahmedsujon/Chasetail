<?php

namespace App\Livewire\App\User\Auth;

use Illuminate\Http\Request;
use Livewire\Component;

class OtpVerifyComponent extends Component
{

    public function verifyOtp(Request $request)
    {
        // Retrieve the OTP from the session
        $storedOtp = session('otp');

        // Check if the entered OTP matches the stored OTP
        if ($request->input('otp') == $storedOtp) {
            // OTP is correct, proceed with registration or other logic
            // Clear the OTP from session
            session()->forget('otp');

            // Redirect to the user dashboard
            return redirect()->route('user.dashboard');
        } else {
            // OTP is incorrect, redirect back with an error message
            return redirect()->back()->with('error', 'The OTP you entered is incorrect.');
        }
    }

    public function render()
    {
        return view('livewire.app.user.auth.otp-verify-component')->layout('livewire.app.layouts.base');
    }
}
