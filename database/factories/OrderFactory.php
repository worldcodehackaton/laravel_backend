<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
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

        $storeIds = $store->id;
        $clientIds = User::clients()->pluck('id')->toArray();
        $productIds = $store->products()->pluck('id')->toArray();

        return [
            'store_id' => $storeIds,
            'client_id' => $this->faker->randomElement($clientIds),
            'product_id' => $this->faker->randomElement($productIds),
            'count' => $this->faker->numberBetween(1, 18),
            'weight' => $this->faker->randomFloat(2, 5, 12),
            'type' => $this->faker->randomElement(Order::$types),
        ];
    }
}
