<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\FeaturedProducts;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::latest()->get(),
            'featured' => FeaturedProducts::pluck('id')->toArray()
        ]);
    }

    public function create()
    {
        return view('admin.products.create', ['categories' => Category::all()]);
    }

    public function store(ProductFormRequest $request)
    {   

        $validatedData = $request->validated();
        $product = new Product;
        $product->product_name = $validatedData['product_name'];
        $product->product_price = $validatedData['product_price'];
        $product->product_desc = $validatedData['product_desc'];
        $product->product_tags = $validatedData['product_tags'];
        
        if($request->hasFile('product_img')){
            $file = $request->file('product_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('uploads/product/', $filename);
            $product->product_img = 'uploads/product/'.$filename;
        }

        $product->product_status = $validatedData['product_status'];
        $product->product_cat = $validatedData['product_cat'];

        $product->save();

        return redirect('admin/products')->with('message', 'Product added successfully');
    }

    public function show(Product $product)
    {
        return view('admin.products.show',['product' => $product]);
    }

    public function edit($id)
    {
        return view('admin.products.edit', ['product' => Product::find($id),
    'categories' => Category::all()]);
    }

    public function update(Request $request, Product $product)
    {
        
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_price'=> 'required',
            'product_desc'=> 'required',
            'product_status'=> 'required',
            'product_tags'=> 'required',
            'product_cat'=> 'required',
        ]);

        $product->product_name = $validatedData['product_name'];
        $product->product_price = $validatedData['product_price'];
        $product->product_desc = $validatedData['product_desc'];
        $product->product_tags = $validatedData['product_tags'];

        if($request->hasFile('product_img')){
            $file = $request->file('product_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('uploads/product/', $filename);
            $product->product_img = 'uploads/product/'.$filename;
        }

        $product->product_status = $request->product_status;

        $product->product_cat = $request->product_cat;
        $product->update();

        return redirect('admin/products')->with('message', 'Product added successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
