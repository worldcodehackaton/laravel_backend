<?php

namespace Database\Factories;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $store = Store::inRandomOrder()->first();

        $storeIds = Store::pluck('id')->toArray();
        $clientIds = User::clients()->pluck('id')->toArray();
        $productIds = $store->products()->pluck('id')->toArray();

        return [
            'store_id' => $this->faker->randomElement($storeIds),
            'client_id' => $this->faker->randomElement($clientIds),
            'product_id' => $this->faker->randomElement($productIds),
            'count' => $this->faker->numberBetween(1, 18),
            'weight' => $this->faker->randomFloat(2, 5, 12),
            'status' => $this->faker->randomElement(Order::$statuses),
            'delivered_at' => $this->faker->dateTimeBetween('26.05.23', '18.06.23'),
        ];
    }
}
