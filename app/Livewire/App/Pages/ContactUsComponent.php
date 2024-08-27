<?php

namespace App\Livewire\App\Pages;

use App\Models\ContactUs;
use Livewire\Component;

class ContactUsComponent extends Component
{
    public $name, $email, $phone, $subject, $message;

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $data = new ContactUs();
        $data->name = $this->name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->subject = $this->subject;
        $data->message = $this->message;

        $data->save();
        session()->flash('success', 'Your message has been sent successfully!');
        $this->resetInputs();
    }


    public function resetInputs()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->subject = null;
        $this->message = null;
    }

    public function render()
    {
        return view('livewire.app.pages.contact-us-component')->layout('livewire.app.layouts.base');
    }
}
