@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Transactions</li>
                <li class="breadcrumb-item active">Stocks</li>
            </ol>
        </nav>
        <h1>Stocks</h1>
    </div>

    <section class="my-3 px-3 py-3 form-category">
        <form action="{{ route('stocks.store') }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-10">
                <div class="row g-3">
                    <div class="col-8">
                        <select class="form-select" aria-label="Default select example" name="stocks_product_name">
                            <option selected>Add Stocks to Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        @error('stocks_product_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-4">
                        <input class="form-control" name="stock_qty" type="number" id=""
                            placeholder="Product Quantity">
                        @error('stock_qty')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="col-2 pe-3 ps-0">

                <button class="btn btn-success float-end w-100" type="submit">Add Stock</button>
            </div>
        </form>
    </section>

    <section class="section p-2">
        <div class="row g-3">
            <div class="card">
                <div class="card-body p-2">
                    <table class="table table-hover mytable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Product Status</th>
                                <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="MM/DD/Year">Added
                                    on</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr>
                                    <th scope="row" class="row"></th>
                                    <td>{{ $stock->product_name }}</td>
                                    <td>{{ $stock->stock_prod_qty }}</td>
                                    <td class="text-success">{{ $stock->product_status }}</td>
                                    <td>{{ $stock->created_at->format('m/d/Y') }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
