<?php

namespace App\Livewire\App\FoundDog;

use App\Models\FoundDog;
use App\Models\FoundReportListing;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FoundDogDetailsComponent extends Component
{

    public $found_dog, $user_id, $found_dog_id, $reason;

    public function mount($id)
    {
        $this->found_dog = FoundDog::where('id', $id)->first();
        $this->found_dog_id = $this->found_dog->id;
    }

    public function storeData()
    {

        $this->validate([
            'reason' => 'required',
        ]);

        $data = new FoundReportListing();
        $data->user_id = Auth::user()->id;
        $data->reason = $this->reason;
        $data->found_dog_id = $this->found_dog_id;
        $data->save();

        $this->dispatch('closeModal');
        session()->flash('success', 'Your listing report has been sent successfully!');
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->user_id = null;
        $this->reason = null;
    }

    public function render()
    {
        return view('livewire.app.found-dog.found-dog-details-component')->layout('livewire.app.layouts.base');
    }
}
