<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $storeIds = Store::pluck('id')->toArray();
        $categoryId = Category::pluck('id')->toArray();

        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 100, 256),
            'description' => $this->faker->text(),
            'store_id' => $this->faker->randomElement($storeIds),
            'category_id' => $this->faker->randomElement($categoryId),
            'calc_type' => $this->faker->randomElement(Product::$calcTypes),
        ];
    }
}
