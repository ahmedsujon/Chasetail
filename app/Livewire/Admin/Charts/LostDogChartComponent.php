<?php

namespace App\Livewire\Admin\Charts;

use App\Models\LostDog;
use Livewire\Component;

class LostDogChartComponent extends Component
{
    public $lost_dogs;
    protected $listeners = ['liveChange' => 'liveUpdate'];

    public function mount()
    {
        $lost_dogs = LostDog::latest()->get();
        foreach ($lost_dogs as $lost_dog) {
            $data['label'][] = $lost_dog->created_at->format('H:i:s');
            $data['data'][] = (int)$lost_dog->id;
        }
        $this->lost_dogs = json_encode($data);
    }

    public function liveUpdate()
    {
        $lost_dogs = LostDog::latest()->get();
        foreach ($lost_dogs as $lost_dog) {
            $data['label'][] = $lost_dog->created_at->format('H:i:s');
            $data['data'][] = (int)$lost_dog->id;
        }
        $this->lost_dogs = json_encode($data);
        $this->emit('liveupdateData', ['data' => $this->lost_dogs]);
    }

    public function render()
    {
        return view('livewire.admin.charts.lost-dog-chart-component')->layout('livewire.admin.layouts.base');
    }
}
