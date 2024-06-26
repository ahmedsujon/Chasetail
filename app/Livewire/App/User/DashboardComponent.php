<?php

namespace App\Livewire\App\User;

use App\Models\LostDog;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;

class DashboardComponent extends Component
{
    public $edit_id, $delete_id;

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $user = User::find($this->delete_id);
        $user->delete();
        $this->dispatch('user_deleted');
        $this->delete_id = '';
    }

    #[Title('Dashboard')]
    public function render()
    {
        $lost_dogs = LostDog::orderBy('id', 'DESC')->get();
        return view('livewire.app.user.dashboard-component', ['lost_dogs' => $lost_dogs])->layout('livewire.app.layouts.base');
    }
}
