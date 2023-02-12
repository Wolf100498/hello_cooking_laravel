<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index', ['categories' => Category::latest()->get()]);
    }

    public function store(CategoryFormRequest $request){
        // dd($request);
        $validatedData = $request->validated();
        $category = new Category;
        $category->category_name = $validatedData['category_name'];
        $category->category_status = $validatedData['category_status'];

        if($request->hasFile('category_img')){
            $file = $request->file('category_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->category_img = 'uploads/category/'.$filename;
        }

        $category->save();

        return redirect()->route('category.index')->with('message', 'Category added successfully');
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category){
        $validatedData = $request->validated();

        $category = Category::findOrFail($category);
         
        $category->category_name = $validatedData['category_name'];

        
        if($request->hasFile('category_img')){
            $path = 'uploads/category'.$category->category_img;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('category_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->category_img = 'uploads/category/'.$filename;
        }


        $category->category_status = $validatedData['category_status'];
        $category->update();

        return redirect()->route('category.index')->with('message', 'Category updated successfully');
    }

    public function destroy(Category $category){
        
        $category->delete();
        return redirect()->route('category.index');
    }
}
