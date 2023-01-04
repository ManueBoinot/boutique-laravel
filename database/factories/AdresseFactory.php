<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresse>
 */
class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rue' => fake()->streetAddress(),
            'code_postal' => fake()->postcode(),
            'commune' => fake()->city(),
            'user_id' => random_int(1, 30)
        ];
    }
}
