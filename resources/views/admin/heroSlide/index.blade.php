@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">System settings</li>
                <li class="breadcrumb-item active">Hero Slide</li>
            </ol>
        </nav>
        <h1>Hero Slides</h1>
    </div>
    <section class="my-3 px-3 py-3 form-category">
        <form action="{{ route('heroslide.store') }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-10">
                <input class="form-control" name="heroslide_img" type="file" id="">
                @error('heroslide_img')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-2 pe-3 ps-0">

                <button class="btn btn-success float-end w-100" type="submit">Add</button>
            </div>
        </form>
    </section>

    <section class="section dashboard">
        <div class="row row-cols-lg-4 g-3">
            @foreach ($heroslides as $heroslide)
                <div class="col">
                    <div class="card rounded-5 h-100">
                        <img src={{ asset($heroslide->image) }} class="card-img-top mb-3" alt="...">
                        <div class="card-body">
                            <form action="{{ route('heroslide.destroy', $heroslide->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger w-100">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
