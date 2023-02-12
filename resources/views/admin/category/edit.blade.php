@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item">Products </li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
        </nav>
        <h1>Edit Category {{ $category->category_name }}</h1>
    </div>

    <section class="my-3">
        <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST"
            enctype="multipart/form-data" class="row">
            @csrf
            @method('PUT')
            <div class="col-10">
                <div class="row g-3">
                    <div class="col-5">
                        <input type="text" class="form-control" name="category_name" placeholder="First name"
                            aria-label="First name" value="{{ $category->category_name }}"
                            placeholder="{{ $category->category_name }}">
                        @error('category_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-4">
                        <input class="form-control" name="category_img" type="file"
                            value="{{ $category->category_img }}">
                        @error('category_img')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-3">
                        <select class="form-select" aria-label="Default select example" name="category_status">
                            <option value="hide" {{ $category->category_status == 'hide' ? 'selected' : '' }}>Hide
                            </option>
                            <option value="show" {{ $category->category_status == 'show' ? 'selected' : '' }}>Show
                            </option>
                        </select>
                        @error('category_status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-2 pe-3 ps-0">

                <button class="btn btn-success float-end" type="submit">Save</button>
            </div>
        </form>
    </section>


    <section class="section dashboard">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card rounded-5">
                    <img src={{ asset($category->category_img) }} class="card-img-top" alt="...">

                </div>
            </div>

        </div>
    </section>
@endsection
