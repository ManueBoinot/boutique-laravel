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
            'rue' => fake()->address(),
            'code_postal' => random_int(01000, 95900),
            'commune' => fake()->city(),
            'user_id' => random_int(1, 30)
        ];
    }
}
