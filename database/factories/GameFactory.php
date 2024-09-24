<?php

// Esteban

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'image' => $this->faker->imageUrl,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->sentence,
            'reviewsSum' => 0,
            'reviewsCount' => 0,
            'balance' => null,
            'balanceDate' => null,
            'balanceReviewsCount' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'company_id' => Company::all()->random()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($game) {
            $categories = Category::all()->random(rand(1, 3))->pluck('id');
            $game->categories()->sync($categories);
        });
    }
}
