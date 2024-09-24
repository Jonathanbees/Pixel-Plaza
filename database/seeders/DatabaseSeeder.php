<?php

// Esteban

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
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
        CustomUser::factory(10)->create();
        Company::factory(3)->create();
        Category::factory(5)->create();
        Game::factory(20)->create();
        Review::factory(10)->create();
    }
}
