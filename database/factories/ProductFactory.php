<?php

namespace Database\Factories;

use App\Models\Product as ProductModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10, 500),
            'sku' => 'DIGI' . $this->faker->numberBetween(10, 500),
            'stock_status' => '0',
            'quantity' => $this->faker->numberBetween(100, 500),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
