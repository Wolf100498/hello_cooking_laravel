@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
        </nav>
        <h1>Category</h1>
    </div>

    <section class="my-3 px-3 py-3 form-category">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-10">
                <div class="row g-3">
                    <div class="col-5">
                        <input type="text" class="form-control" name="category_name" placeholder="New Category"
                            aria-label="First name">
                        @error('category_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-4">
                        <input class="form-control" name="category_img" type="file" id="formFile">
                        @error('category_img')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-3">
                        <select class="form-select" aria-label="Default select example" name="category_status">
                            <option value="hide" selected>Hide</option>
                            <option value="show">Show</option>
                        </select>
                        @error('category_status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-2 pe-3 ps-0">

                <button class="btn btn-success float-end" type="submit">Create</button>
            </div>
        </form>
    </section>


    <section class="section dashboard">
        <div class="row row-cols-lg-4 g-3">

            @foreach ($categories as $category)
                <div class="col">
                    <div class="card rounded-5 h-100" id="category-card-admin">
                        <div class="card-img-top">

                            <img src={{ $category->category_img ? asset($category->category_img) : asset('admin/assets/blog02.png') }}
                                alt="...">
                        </div>
                        <div class="card-body m-0 px-2 py-2">
                            <h5 class="card-title p-0 mb-2 mt-1">{{ $category->category_name }}</h5>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <a href="{{ route('category.edit', ['category' => $category->id]) }}"
                                        class="btn btn-sm bg-success text-light me-1 px-2 py-0">Edit</a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-sm bg-danger text-light px-2 py-0 me-1"
                                            value="Delete">
                                    </form>
                                    <a href="{{ route('category.edit', ['category' => $category->id]) }}"
                                        class="btn btn-sm bg-primary text-light me-1 px-2 py-0">{{ Str::ucfirst($category->category_status) }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
