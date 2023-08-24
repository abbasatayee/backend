<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition()
    {
        $types = ['expirable', 'un_expirable'];

        return [
            'sku' => $this->faker->unique()->bothify('SKU-??#####'),
            'product_name' => $this->faker->words(2, true),
            'p_code' => Str::random(10),
            'type' => $this->faker->randomElement($types),
            'expiration_date' => $this->faker->optional()->date(),
            'category_id' => null,
            'unit' => $this->faker->randomElement(['piece', 'box', 'kg']),
            'description' => $this->faker->optional()->sentence,
            'number_of_sales' => $this->faker->optional()->randomNumber(2),
            'is_published' => $this->faker->boolean(75),
        ];
    }
}
