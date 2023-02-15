<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        if(session('cart')>0){
            $totalAmount = $this->totalAmount();
            return view('frontend.cart', [
                'totalCartAmount' => $totalAmount
            ]);
        }

        return view('frontend.cart');
    }

    public function addToCart($id){
        $categories = Category::where('category_status', 'show')->get();
        $optionsCategory = Category::where('category_status', 'show')->get();
        $products = Product::where('product_status', 'Available')->get();
        $this->add($id);
        return redirect('/recipes')->with('message', 'Product added to cart successfully');
    }


    protected function add($id){
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

    public function update(Request $request){
        $cart = session()->get('cart');
        $id = $request->product_id;
        if($request->quantity == 0){
            $request->session()->forget('cart.'.$request->product_id);
        return redirect('/cart')->with('message', 'Product quantity updated');

        }
        $cart[$id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
        
        return redirect()->route('cart')->with('message', 'Product quantity updated');
    }

    public function destroy(Request $request, $id){
        $request->session()->forget('cart.'.$id);
        return redirect('/cart')->with('danger', 'Product remove from cart.');
    }

    protected function totalAmount(){
        $cartItems= session()->get('cart');
        $totalAmount = 0;

        foreach($cartItems as $cartItem){
            $product = $cartItem['product_price'] * $cartItem['quantity'];
            $totalAmount += $product;
        }
        return $totalAmount;
    }
}
