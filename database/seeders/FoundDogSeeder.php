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
                'name' => $faker->name,
                'color' => $faker->colorName,
                'gender' => $faker->randomElement(['male', 'female']),
                'breed' => $faker->word,
                'description' => $faker->text,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
                'photos' => 'assets/app/images/found-dog-1.jpg',
                'status' => $faker->numberBetween(0,1),
                'missing_status' => $faker->randomElement(['found', 'searching', 'not_found']),
            ]);
        }
    }
}
