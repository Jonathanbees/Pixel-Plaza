<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'image' => $this->faker->imageUrl,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->sentence,
            'company' => $this->faker->company,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
