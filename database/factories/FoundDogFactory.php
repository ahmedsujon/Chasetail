<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoundDog>
 */
class FoundDogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'user_id' => $faker->numberBetween(1, 2),
            'color' => $faker->colorName,
            'gender' => $faker->gender,
            'description' => $faker->text,
            'longitude' => $faker->longitude,
            'latitude' => $faker->latitude,
        ];
    }
}
