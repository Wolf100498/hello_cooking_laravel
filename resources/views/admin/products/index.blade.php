@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
        <h1>Products <a href="{{ url('admin/products/create') }}" class="btn btn-success btn-sm float-end">Create New</a></h1>
    </div>
    <section class="section dashboard">
        <div class="row row-cols-lg-4">

            @foreach ($products as $product)
                <div class="col mb-3">
                    <div class="card rounded-5 h-100" id="product-card-admin">
                        <div class="card-img-top">
                            <img src={{ $product->product_img ? asset($product->product_img) : 'imgs/recipes/main-dish/1.png' }}
                                alt="...">
                        </div>
                        <div class="card-body m-0 px-2 py-2 h-max-content">
                            <h5 class="card-title p-0 mb-2 mt-1">{{ $product->product_name }}</h5>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                        class="btn btn-sm bg-success text-light me-1 px-2">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-sm bg-danger text-light px-2 py-1 me-1"
                                            value="Delete" />
                                    </form>
                                    <form action="{{ route('featuredproducts.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="afid" value="{{ $product->id }}">
                                        <input type="submit" class="btn btn-sm btn-warning px-2 py-1 me-1"
                                            <?= in_array($product->id, $featured) ? 'disabled' : '' ?>
                                            value=<?= in_array($product->id, $featured) ? 'Featured' : 'Feature' ?> />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
