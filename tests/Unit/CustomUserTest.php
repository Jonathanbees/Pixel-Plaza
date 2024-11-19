<?php

namespace Tests\Unit;

use App\Models\CustomUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CustomUserTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_user(): void
    {
        $user = CustomUser::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        $this->assertDatabaseHas('custom_users', [
            'email' => 'john@example.com',
        ]);
    }

    #[Test]
    public function it_can_check_if_user_is_admin(): void
    {
        $user = CustomUser::factory()->create([
            'is_admin' => true,
        ]);

        $this->assertTrue($user->getIsAdmin());
    }

    #[Test]
    public function it_can_check_if_user_is_not_admin(): void
    {
        $user = CustomUser::factory()->create([
            'is_admin' => false,
        ]);

        $this->assertFalse($user->getIsAdmin());
    }
}
