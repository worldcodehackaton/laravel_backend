<?php

namespace Database\Factories;

use App\Models\Basket;
use App\Models\Delivery;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $storeIds = Store::pluck('id')->toArray();
        $clientIds = User::clients()->pluck('id')->toArray();
        $basketIds = Basket::pluck('id')->toArray();

        return [
            'store_id' => $this->faker->randomElement($storeIds),
            'client_id' => $this->faker->randomElement($clientIds),
            'status' => $this->faker->randomElement(Delivery::$statuses),
            'delivered_at' => $this->faker->dateTimeBetween('26.05.23', '18.06.23'),
            'baskets' => $this->faker->randomElements($basketIds, 5),
        ];
    }
}
