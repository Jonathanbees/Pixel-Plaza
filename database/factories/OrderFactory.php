<?php

// Esteban

namespace Database\Factories;

use App\Models\CustomUser;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'total_price' => 0,
            'custom_user_id' => CustomUser::all()->random()->getId(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
