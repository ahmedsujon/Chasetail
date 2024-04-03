<?php

namespace Database\Seeders;

use App\Models\LostDog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LostDogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            LostDog::create([
                'user_id' => $faker->randomDigit(1,5),
                'payment_status' => $faker->randomElement(['paid', 'unpaid']),
                'name' => $faker->firstName,
                'gender' => $faker->randomElement(['male', 'female']),
                'color' => $faker->colorName,
                'breed' => $faker->word,
                'description' => $faker->text,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
                'images' => 'assets/app/images/content-dog01.jpg',
                'missing_status' => $faker->randomElement(['Found', 'Searching', 'Not Found']),
                'status' => $faker->numberBetween(0,1),
            ]);
        }
    }
}
