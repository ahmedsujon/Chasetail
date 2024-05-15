<?php

namespace App\Livewire\App\FoundDogReport;

use Livewire\Component;
use App\Models\FoundDog;
use Illuminate\Support\Facades\Auth;

class FoundDogReportStepThreeComponent extends Component
{
    public $user_id, $longitude, $latitude, $images, $name, $breed, $address, $gender, $color, $found_date, $microchip_id, $description;

    public function storeData()
    {
        $this->validate([
            'color' => 'required',
            'gender' => 'required',
            'found_date' => 'required',
            'description' => 'required',
        ]);

        $data = new FoundDog();
        $data->user_id = Auth::user()->id;

        $data->latitude = session('latitude');
        $data->longitude = session('longitude');
        $data->images = session('images');
        $data->address = session('address');

        $data->name = 'Unknown';
        $data->breed = $this->breed;
        $data->color = $this->color;
        $data->gender = $this->gender;
        $data->found_date = $this->found_date;
        $data->microchip_id = $this->microchip_id;
        $data->description = $this->description;
        $data->address = $this->address;

        // dd($data);

        $data->save();

        return $this->redirect('/user/dashboard', navigate: true);
        session()->flash('success', 'Report posted added successfully');
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->user_id = null;
        $this->latitude = null;
        $this->longitude = null;
        $this->images = null;
        $this->name = null;
        $this->breed = null;
        $this->color = null;
        $this->address = null;
        $this->gender = null;
        $this->found_date = null;
        $this->microchip_id = null;
        $this->description = null;
    }

    public function render()
    {
        return view('livewire.app.found-dog-report.found-dog-report-step-three-component')->layout('livewire.app.layouts.base');
    }
}
