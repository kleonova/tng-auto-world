<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_id' => fake()->numberBetween(1, 4),
            'model' => fake()->words(1, true),
            'vin' => fake()->unique()->randomNumber(5, true),
            'price' => fake()->randomNumber(5, true),
            'transmission' => fake()->numberBetween(1, 3),
            'created_year' => fake()->year(),
        ];
    }
}
