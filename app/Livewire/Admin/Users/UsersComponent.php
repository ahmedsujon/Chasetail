<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class UsersComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm, $sortBy = 'created_at', $sortDirection = 'DESC';
    public $edit_id, $delete_id;
    public $name, $email, $phone, $status;

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDirection = ($this->sortDirection ==  "ASC") ? 'DESC' : "ASC";
            return;
        }
        $this->sortBy = $sortByField;
        $this->sortDirection = 'DESC';
    }

    public function editData($id)
    {
        $data = User::find($id);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->phone = $data->phone;
        $this->edit_id = $data->id;
        $this->dispatch('showEditModal');
    }

    public function updateData()
    {
        if ($this->password) {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
            ]);
        } else {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
            ]);
        }

        $user = User::find($this->edit_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;

        // if ($this->avatar) {
        //     $imageName = Carbon::now()->timestamp . '_favicon' . $this->avatar->extension();
        //     $this->avatar->storeAs('profile_images', $imageName);
        //     $user->avatar = 'uploads/profile_images/' . $imageName;
        // }

        $user->save();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'Customer updated successfully']);
        $this->resetInputs();
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->status = null;
        $this->edit_id = null;
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $admin = User::find($this->delete_id);
        $admin->delete();
        $this->dispatch('customer_deleted');
        $this->delete_id = '';
    }

    #[Title('Customer List')]
    public function render()
    {
        $customers = User::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.users.users-component', ['customers' => $customers])->layout('livewire.admin.layouts.base');
    }
}
