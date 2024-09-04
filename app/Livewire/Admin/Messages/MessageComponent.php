<?php

namespace App\Livewire\Admin\Messages;

use App\Models\ContactUs;
use Livewire\Component;
use Livewire\WithPagination;

class MessageComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public $edit_id, $delete_id;

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $admin = ContactUs::find($this->delete_id);
        $admin->delete();
        $this->dispatch('message_deleted');
        $this->delete_id = '';
    }

    public function render()
    {
        $messages = ContactUs::where('name', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.messages.message-component', ['messages'=>$messages])->layout('livewire.admin.layouts.base');
    }
}
