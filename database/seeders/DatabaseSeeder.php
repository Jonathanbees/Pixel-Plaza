<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CustomUser;
use App\Models\Game;
use App\Models\Review;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Review::factory(10)->create();
        Category::factory(10)->create();
        Game::factory(20)->create();
        CustomUser::factory(5)->create();
    }
}
