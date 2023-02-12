<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductsShow extends Component
{


    public function render()
    {   

        $categories = Category::get();
        $products = Product::where('product_status', 'Available')->get();
        return view('livewire.frontend.products.products-show', ['categories' => $categories, 'products' => $products]);
    }
}
