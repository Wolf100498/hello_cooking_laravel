@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">Featured Products</li>
            </ol>
        </nav>
        <h1>Featured Products</h1>
    </div>


    <section class="section dashboard">
        <div class="row row-cols-lg-4 g-3">
            @foreach ($featureds = App\Models\FeaturedProducts::all() as $featured)
                <div class="col">
                    <div class="card rounded-5 h-100">
                        <div class="card-img-top">
                            <img src={{ $featured->product->product_img ? asset($featured->product->product_img) : asset('imgs/comments/peopleeating (3).jpg') }}
                                style="aspect-ration:16/9; object-fit:cover;" alt="...">
                        </div>
                        <div class="card-body m-0 px-2 py-2">
                            <h5 class="card-title p-0 mb-2 mt-1">{{ $featured->product->product_name }}</h5>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">

                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <form action="{{ route('featuredproducts.destroy', $featured->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm bg-danger text-light px-2 py-1 me-1"
                                    value="Delete" />
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
