<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_category(): void
    {
        $category = Category::create([
            'name' => 'Test Category',
            'description' => 'This is a test category.',
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'Test Category',
            'description' => 'This is a test category.',
        ]);
    }

    #[Test]
    public function it_requires_a_name_to_create_a_category(): void
    {
        $this->expectException(QueryException::class);

        Category::create([
            'description' => 'This is a test category.',
        ]);
    }

    #[Test]
    public function it_requires_a_description_to_create_a_category(): void
    {
        $this->expectException(QueryException::class);

        Category::create([
            'name' => 'Test Category',
        ]);
    }
}
