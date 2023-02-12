@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
        <h1>Edit {{ $product->product_name }}</h1>
    </div>

    <section class="my-3 px-3 py-3 form-category">
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data"
            class="row">
            @csrf
            @method('PUT')
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control mb-3" name="product_name" placeholder="New Category"
                            aria-label="First name" value="{{ $product->product_name }}">
                        @error('product_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <input class="form-control mb-3" name="product_price" type="text" id=""
                            placeholder="Product Price" value="{{ $product->product_price }}">
                        @error('product_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input class="form-control mb-3" name="product_tags" type="text" id=""
                            placeholder="Product Tags" value="{{ $product->product_tags }}">
                        @error('product_tags')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="product_status">
                                <option value="available" {{ $product->product_status == 'available' ? 'selected' : '' }}>
                                    Available
                                </option>
                                <option value="out-of-stock"
                                    {{ $product->product_status == 'out-of-stock' ? 'selected' : '' }}>Out
                                    of
                                    Stock</option>
                                <option value="disable" {{ $product->product_status == 'disable' ? 'selected' : '' }}>
                                    Disable
                                </option>
                            </select>
                            @error('product_cat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                    </div>
                    <div class="col-6">
                        <div class="img-container edit-product">
                            <img src="{{ asset($product->product_img) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-6">
                        <select class="form-select" aria-label="Default select example" name="product_cat"
                            value="{{ $product->product_cat }}">
                            @foreach ($categories as $category)
                                @if ($category->category_status == 'show')
                                    <option value="{{ $category->category_name }}"
                                        {{ $category->category_name == $product->product_cat ? 'selected' : '' }}>
                                        {{ $category->category_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('product_cat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        <input class="form-control" name="product_img" type="file" id="formFile">
                        @error('product_img')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

            </div>

            <div class="col-12 mb-3">
                <textarea class="form-control" style="height: 100px" name="product_desc" placeholder="Product Description">{{ $product->product_desc }}</textarea>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12 mb-3">
                        <button class="btn btn-success  w-100" type="submit">Update</button>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('products.index') }}" type="button" class="btn btn-danger w-100">Cancel</a>
                    </div>
                </div>
            </div>

        </form>
    </section>
@endsection
