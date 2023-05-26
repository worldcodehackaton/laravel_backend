<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::clients()->pluck('id')->toArray();
        $storeIds = Store::pluck('id')->toArray();

        return [
            'text' => $this->faker->text(100) ,
            'rate' => $this->faker->numberBetween(1, 5),
            'client_id' => $this->faker->randomElement($userIds),
            'store_id' => $this->faker->randomElement($storeIds),
        ];
    }
}
