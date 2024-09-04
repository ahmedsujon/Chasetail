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
                'name' => "Your pets name",
                'gender' => $faker->randomElement(['male', 'female']),
                'last_seen' =>$faker->date,
                'color' => $faker->colorName,
                'breed' => $faker->word,
                'description' => $faker->text,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
                'address' => $faker->address(),
                'images' => 'assets/app/images/placeholder.jpg',
                'missing_status' => $faker->randomElement(['Found', 'Rescued']),
                'status' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
