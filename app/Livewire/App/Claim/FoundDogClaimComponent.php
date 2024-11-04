<?php

namespace App\Livewire\App\Claim;

use Livewire\Component;
use App\Models\ClaimFoundPet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FoundDogClaimComponent extends Component
{
    public $user_id, $name, $email, $phone, $descriptions;

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Store the claim data in the database
        $data = new ClaimFoundPet();
        $data->user_id = Auth::user()->id;
        $data->name = $this->name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->descriptions = $this->descriptions;
        $data->save();

        // Prepare mail data
        $mailData = [
            'user_id' => $data->user_id,
            'name' => $data->name,
            'email' => $data->email,
            'phone' => $data->phone,
            'descriptions' => $data->descriptions,
        ];

        // Get the owner's email
        $ownerEmail = getUserByID($data->user_id)->email;

        // Send email
        Mail::send('emails.found-pet-claim', $mailData, function ($message) use ($ownerEmail) {
            $message->to($ownerEmail)
                ->subject('Found Pet Claim Notification');
        });
        // Set success message and reset inputs
        session()->flash('success', 'Your message has been sent successfully! An email will be sent to the owner shortly.');
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->user_id = null;
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->descriptions = null;
    }

    public function render()
    {
        return view('livewire.app.claim.found-dog-claim-component')->layout('livewire.app.layouts.base');
    }
}
