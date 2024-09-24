<?php

// Samuel

namespace Database\Factories;

use App\Models\CustomUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomUserFactory extends Factory
{
    protected $model = CustomUser::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('123456789'),
            'is_admin' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
