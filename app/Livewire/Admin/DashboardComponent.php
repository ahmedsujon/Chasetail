<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use App\Models\ContactUs;
use App\Models\FoundDog;
use App\Models\LostDog;
use App\Models\Subscription;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;

class DashboardComponent extends Component
{
    #[Title('Dashboard')]
    public function render()
    {
        $lost_pets = LostDog::count();
        $found_pets = FoundDog::count();
        $subscritions = Subscription::sum('amount');
        $customer = User::count();
        $admins = Admin::count();
        $messages = ContactUs::count();
        return view('livewire.admin.dashboard-component',
        [
            'lost_pets'=> $lost_pets,
            'found_pets'=> $found_pets,
            'subscritions' =>$subscritions,
            'customer' =>$customer,
            'admins' => $admins,
            'messages' => $messages
        ])->layout('livewire.admin.layouts.base');
    }
}
