<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminpassword**'),
            'role_as' => '1',

         ]);

        User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('password'),
            'role_as' => '0',
            'phone' => 30320381284,
            'address' => 'tondo'
        ]);

        Category::create([
            'category_name' => 'Main Dish',
            'category_img' => 'uploads/category/1667450656.jpg',
            'category_status' => 'show',
        ]);

        Category::create([
            'category_name' => 'Side Dish',
            'category_img' => 'uploads/category/1667450677.jpg',
            'category_status' => 'show',
        ]);

        Category::create([
            'category_name' => 'Desserts',
            'category_img' => 'uploads/category/1667450719.jpg',
            'category_status' => 'show',
        ]);

        Category::create([
            'category_name' => 'Snacks',
            'category_img' => 'uploads/category/1667450697.jpg',
            'category_status' => 'show',
        ]);
//  'category_name',
//         'category_img',
//         'category_status'

        Product::create([
            'product_name' => 'Chicken Adobo',
            'product_price' => '150',
            'product_desc' => 'Chicken Adobo Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, at.',
            'product_status' => 'Disable',
            'product_tags' => 'Chicken, Soy',
            'product_img' => 'uploads/product/1669313026.png',
            'product_cat' => 'Main Dish',
        ]);

        Product::create([
            'product_name' => 'Crispy Pata Burger',
            'product_price' => '200',
            'product_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, at.',
            'product_status' => 'Disable',
            'product_tags' => 'Beef, Burger',
            'product_img' => 'uploads/product/1669313254.jpg',
            'product_cat' => 'Snacks',
        ]);

        Product::create([
            'product_name' => 'Vegan Sisig',
            'product_price' => '120',
            'product_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, at.',
            'product_status' => 'Disable',
            'product_tags' => 'Sisig, Vegan',
            'product_img' => 'uploads/product/1669313358.jpg',
            'product_cat' => 'Main Dish',
        ]);

        Product::create([
            'product_name' => 'Chocolate Cheese Cake',
            'product_price' => '250',
            'product_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, at.',
            'product_status' => 'Disable',
            'product_tags' => 'Chocolate, Cake, Cheesse',
            'product_img' => 'uploads/product/1669313495.jpg',
            'product_cat' => 'Desserts',
        ]);

        Product::create([
            'product_name' => 'Quinoa Spinach Salad',
            'product_price' => '150',
            'product_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, at.',
            'product_status' => 'Disable',
            'product_tags' => 'Spinach, Salad',
            'product_img' => 'uploads/product/1669313794.jpg',
            'product_cat' => 'Side Dish',
        ]);

        Product::create([
            'product_name' => 'Chicken Afritada',
            'product_price' => '170',
            'product_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, at.',
            'product_status' => 'Disable',
            'product_tags' => 'Chicken, Tomatoes',
            'product_img' => 'uploads/product/1669313862.jpg',
            'product_cat' => 'Main Dish',
        ]);

        Product::create([
            'product_name' => 'Tunasand',
            'product_price' => '140',
            'product_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, at.',
            'product_status' => 'Disable',
            'product_tags' => 'Tuna',
            'product_img' => 'uploads/product/1669313942.jpg',
            'product_cat' => 'Main Dish',
        ]);


    }
    
    // 'product_name',
    //     'product_price',
    //     'product_desc',
    //     'product_img',
    //     'product_status',
    //     'product_tags',
    //     'product_cat'
}
