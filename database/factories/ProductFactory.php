<?php

namespace Database\Factories;

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
    public function definition()
    // 'product_name',
    //     'product_price',
    //     'product_desc',
    //     'product_img',
    //     'product_status',
    //     'product_tags',
    //     'product_cat'
    {
        return [
            'product_name' => $this -> faker -> word(),
            'product_price' => $this -> faker -> randomNumber(3, 999),
            'product_desc' => $this -> faker -> sentence(),
            'product_status' => 'Available',
            'product_tags' => 'Chicken, Bread, Pork Fruits',
            'product_cat' => 'Main Dish'
        ];
    }
}
