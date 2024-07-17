<?php

namespace Database\Seeders;

use App\Models\LostDog;
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
        foreach (range(1,2) as $index) {
            LostDog::create([
                'user_id' => $faker->randomDigit(1, 2),
                'payment_status' => $faker->randomElement(['paid', 'unpaid']),
                'name' => "",
                'gender' => $faker->randomElement(['male', 'female']),
                'color' => $faker->colorName,
                'breed' => $faker->word,
                'description' => $faker->text,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
                'address' => $faker->address(),
                'images' => 'assets/app/images/lost-dog-list' . sprintf('%02d', $index) . '.jpg',
                'missing_status' => $faker->randomElement(['Found', 'Rescued']),
                'status' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
