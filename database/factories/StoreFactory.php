<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $farmerIds = User::farmers()->pluck('id')->toArray();

        return [
            'rate' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->text(),
            'farmer_id' => $this->faker->randomElement($farmerIds),
        ];
    }
}
