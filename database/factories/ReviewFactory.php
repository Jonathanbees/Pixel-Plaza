<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'comment' => $this->faker->paragraph,
            'client' => $this->faker->name,
            'game' => $this->faker->company,
        ];
    }
}
