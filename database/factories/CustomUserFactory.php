<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomUserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('12344'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
