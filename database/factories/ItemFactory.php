<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'order_id' => Order::all()->random()->getId(),
            'game_id' => Game::all()->random()->getId(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Item $item) {
            $order = $item->getOrder();
            $order->setTotalPrice($order->getTotalPrice() + $item->getPrice());
            $order->save();
        });
    }
}
