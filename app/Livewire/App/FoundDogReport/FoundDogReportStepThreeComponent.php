<?php

namespace App\Livewire\App\FoundDogReport;

use Livewire\Component;
use App\Models\FoundDog;
use Illuminate\Support\Facades\Auth;

class FoundDogReportStepThreeComponent extends Component
{
    public $user_id, $id, $breed, $medicine_info, $address, $longitude, $photos, $images,
        $name, $gender, $found_date, $microchip_id, $description, $marking, $color;

    public $characterCount = 0;
    public $maxCharacters = 150;

    public function updatedDescription()
    {
        $this->characterCount = strlen($this->description);
    }

    public function storeData()
    {

        $this->validate([
            'name' => 'required',
            'breed' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'found_date' => 'required',
        ]);

        session()->put('name', $this->name);
        session()->put('breed', $this->breed);
        session()->put('gender', $this->gender);
        session()->put('found_date', $this->found_date);
        session()->put('description', $this->description);
        return $this->redirect('/found-dog-report-account-create', navigate: false);
    }

    public function submitData()
    {
        $this->validate([
            'name' => 'required',
            'breed' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'found_date' => 'required',
        ]);

        $data = new FoundDog();
        $data->user_id = Auth::user()->id;
        $data->latitude = session('latitude');
        $data->longitude = session('longitude');
        $data->images = session('images');
        $data->address = session('address');

        $data->name = $this->name;
        $data->breed = $this->breed;
        $data->color = $this->color;
        $data->marking = $this->marking;
        $data->gender = $this->gender;
        $data->found_date = $this->found_date;
        $data->microchip_id = $this->microchip_id;
        $data->description = $this->description;
        $data->save();
        return $this->redirect('/found-dogs', navigate: true);
        session()->flash('success', 'Report posted successfully!');
        $this->resetInputs();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'breed' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'found_date' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.app.found-dog-report.found-dog-report-step-three-component')->layout('livewire.app.layouts.base');
    }
}
