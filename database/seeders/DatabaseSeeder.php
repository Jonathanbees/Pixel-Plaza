<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Review::factory(12)->create();
        Category::factory(8)->create();
    }
}
