<?php

namespace Database\Seeders;

use App\Models\FoundDog;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FoundDogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            FoundDog::create([
                'user_id' => $faker->randomDigit(1,10),
                'color' => $faker->colorName,
                'gender' => $faker->randomElement(['male', 'female']),
                'description' => $faker->text,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
            ]);
        }
    }
}
