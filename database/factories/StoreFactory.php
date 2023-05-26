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
            'description' => $this->faker->text(),
            'farmer_id' => $this->faker->randomElement($farmerIds),
        ];
    }
}
