<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'login' => $this->faker->unique()->userName(),
            'birthed_at' => $this->faker->dateTimeBetween('-50 years', '-18 years'),
            'registered_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'avatar' => $this->faker->imageUrl(),
            'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
