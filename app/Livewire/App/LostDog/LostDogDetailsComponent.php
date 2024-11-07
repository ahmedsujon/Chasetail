<?php

namespace App\Livewire\App\LostDog;

use App\Models\LostDog;
use Livewire\Component;
use App\Models\LostReportListing;
use Illuminate\Support\Facades\Auth;

class LostDogDetailsComponent extends Component
{

    public $lost_dog, $user_id, $lost_dog_id, $reason;

    public function mount($id)
    {
        $lost_dog = LostDog::where('id', $id)->first();
        $this->lost_dog = $lost_dog;
        $this->lost_dog_id = $this->lost_dog->id;
    }

    public function storeData()
    {

        $this->validate([
            'reason' => 'required',
        ]);

        $data = new LostReportListing();
        $data->user_id = Auth::user()->id;
        $data->reason = $this->reason;
        $data->lost_dog_id = $this->lost_dog_id;
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
        return view('livewire.app.lost-dog.lost-dog-details-component')->layout('livewire.app.layouts.base');
    }
}
