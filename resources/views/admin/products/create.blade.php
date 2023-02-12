@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
        <h1>Create New Product</h1>
    </div>

    <section class="my-3 px-3 py-3 form-category">
        <form action="{{ route('products.index') }}" method="post" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-6 mb-3">
                <input type="text" class="form-control" name="product_name" placeholder="Product Name"
                    aria-label="First name">
                @error('product_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <input class="form-control" name="product_img" type="file" id="formFile">
                @error('product_img')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-3 mb-3">
                <input class="form-control" name="product_price" type="text" id="" placeholder="Product Price">
                @error('product_price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-9 mb-3">
                <input class="form-control" name="product_tags" type="text" id="" placeholder="Product Tags">
                @error('product_tags')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <select class="form-select" aria-label="Default select example" name="product_cat">
                    <option selected>Product Category</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->category_name }}">
                            {{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('product_cat')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <select class="form-select" aria-label="Default select example" name="product_status">
                    <option selected value="available">Available</option>
                    <option value="out-of-stock">Out of Stock</option>
                    <option value="disable">Disable</option>
                </select>
                @error('product_status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <textarea class="form-control" style="height: 100px" name="product_desc" placeholder="Product Description"></textarea>
            </div>


            <div class="col-12">
                <button class="btn btn-success w-100" type="submit">Create</button>
            </div>
        </form>
    </section>
@endsection
