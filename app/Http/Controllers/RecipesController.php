<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecipesController extends Controller
{
    public function index(Request $request){

        if($request['category'] ?? false){
            $products = Product::where('product_cat', $request['category'])
                                ->where('product_status', 'Available')
                                ->get();
            $categories = Category::where('category_name', $request['category'])
                                ->where('category_status', 'show')
                                ->get();
            $optionsCategory = Category::where('category_status', 'show')->get();

        }else if($request['search'] ?? false){

            $products = Product::where('product_name', 'like', "%".$request['search']."%")
                                ->where('product_status', 'Available')
                                ->get();
            $categories = Category::join('products', 'product_cat', '=', 'category_name')
                                ->where('product_name', 'like', "%".$request['search']."%")
                                ->where('category_status', 'show')
                                ->select('category_name')
                                ->distinct()
                                ->get();
            $optionsCategory = Category::where('category_status', 'show')->get();

        }else{
            $optionsCategory = Category::where('category_status', 'show')->get();
            $categories = Category::where('category_status', 'show')->get();
            $products = Product::where('product_status', 'Available')->get();

        }
        return view('frontend.products', [
            'optionsCategory' => $optionsCategory, 
            'categories' => $categories,
            'products' => $products
        ]);
    }



}
