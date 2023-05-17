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
            'brand' => 'Toyota',
            'model' => fake()->words(1, true),
            'price' => fake()->randomNumber(5, true),
            'avatar' => 'default.jpg', 
            'created_year' => fake()->year(),
            'body_style' => 1
        ];
    }
}
