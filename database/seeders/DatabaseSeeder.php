<?php

// Esteban

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\CustomUser;
use App\Models\Game;
use App\Models\Item;
use App\Models\Order;
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
        Review::factory(80)->create();
        Order::factory(10)->create();
        Item::factory(30)->create();
    }
}
