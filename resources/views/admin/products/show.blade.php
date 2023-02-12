@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">{{ $product->product_name }}</li>
            </ol>
        </nav>
        <h1>{{ $product->product_name }}</h1>
    </div>

    <section class="my-3 px-3 py-3 form-category">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-img-container">
                    <img src={{ asset($product->product_img) }} alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm float-end">Edit</a>
                <article class="pt-5">
                    <ul>
                        <li>Price: {{ $product->product_price }}</li>
                        <li>Status: {{ $product->product_status }}</li>
                        <li>Category: {{ $product->product_cat }}</li>
                        <li>Tags: {{ $product->product_tags }}</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>
@endsection
