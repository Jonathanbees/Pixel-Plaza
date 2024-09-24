<?php

// Esteban

namespace Database\Factories;

use App\Models\CustomUser;
use App\Models\Game;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'custom_user_id' => CustomUser::all()->random()->getId(),
            'game_id' => Game::all()->random()->getId(),
            'rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'comment' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Review $review) {
            $game = Game::find($review->getGame()->getId());
            $game->incrementReviewStats($review->getRating());
        });
    }
}
