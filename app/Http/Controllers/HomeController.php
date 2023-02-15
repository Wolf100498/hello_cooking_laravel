<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FeaturedProducts;
use App\Models\HeroSlide;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $categories;
    public $features;
    public $heroSlides;

    public function __construct()
    {
        $this->categories = Category::all();
        $this->features = FeaturedProducts::latest()->get();
        $this->heroSlides = HeroSlide::all();
    }

    public function index()
    {   
        return view('frontend.index', [
            'categories' => $this->categories,
            'features' => $this->features,
            'heroSlides' => $this->heroSlides
        ]);
    }
    
    public function addToCart($id){

        $this->add($id);
        return redirect('/')->with('message', 'Product added to cart');
    }

    public function add($id){
        $product = Product::findOrFail($id);
            
        $cart = session()->get('cart');

            if(!$cart) {
                $cart = [
                        $id => [
                            "product_id" => $product->id,
                            "product_name" => $product->product_name,
                            "quantity" => 1,
                            "product_price" => $product->product_price,
                            "product_img" => $product->product_img,
                            "product_desc" => $product->product_desc,
                            "product_status" => $product->product_status,
                            "product_tags" => $product->product_tags,
                            "product_category" =>  $product->product_cat,
                        ]
                ];
                session()->put('cart', $cart);
                return $cart;

            }

            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);
                return $cart;
            }

            $cart[$id] = [
                    "product_id" => $product->id,
                    "product_name" => $product->product_name,
                            "quantity" => 1,
                            "product_price" => $product->product_price,
                            "product_img" => $product->product_img,
                            "product_desc" => $product->product_desc,
                            "product_status" => $product->product_status,
                            "product_tags" => $product->product_tags,
                            "product_category" => $product->product_cat,
            ];
            session()->put('cart', $cart);
            return $cart;

    }

    
}
