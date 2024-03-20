<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emails = ["user@example.com", "user1@example.com", "user2@example.com", "user3@example.com", "user4@example.com"];

        foreach ($emails as $key => $email) {
            $getUser = User::where('email', $email)->first();
            if (!$getUser) {
                $user = new User();
                $user->name = "User";
                $user->email = $email;
                $user->phone = '0170000000';
                $user->password = Hash::make('12345678');
                $user->avatar = 'assets/images/avatar.png';
                $user->save();
            }
        }
    }
}
