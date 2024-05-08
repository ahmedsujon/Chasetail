<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(1000)->create();
        // \App\Models\User::factory(5)->create();

        $this->call(PermissionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(LostDogSeeder::class);
        $this->call(FoundDogSeeder::class);
    }
}
