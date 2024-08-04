<?php

namespace Database\Factories;

use App\Models\Argument;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mock>
 */
class MockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "name" => fake()->name(""),
            "function" => fake()->randomElement(['name', 'boolean', 'email', 'phoneNumber', 'address', 'text', 'number', 'randomElement', 'randomElements', 'randomDigit', 'randomDigitNotNull', 'randomNumber', 'randomFloat', 'randomLetter']),
            // "arguments" => $created_arguments
        ];
    }
}
