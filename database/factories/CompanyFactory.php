<?php

// Esteban

namespace Database\Factories;

use App\Models\CustomUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'custom_user_id' => CustomUser::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
