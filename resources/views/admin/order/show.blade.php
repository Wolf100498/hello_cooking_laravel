@extends('layouts.admin')

@section('content')
    <section>
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Transactions</li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </nav>
            <h1>Orders</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card  h-100 pt-3    ">
                    <div class="card-body">
                        <h5>Order Details</h5>
                        <hr>
                        <p>Order Code: {{ $order->order_number }}</p>
                        <p>Payment Mode: {{ $order->payment_method }}</p>
                        <p>Order Status: <span class="text-success">{{ $order->status }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card h-100 pt-3">
                    <div class="card-body">
                        <h5>User Details</h5>
                        <hr>
                        <p>Full Name:{{ $order->name }}</p>
                        <p>Email: {{ $order->email }}</p>
                        <p>Phone: {{ $order->phone }}</p>
                        <p>Address: {{ $order->address }}</p>
                    </div>
                </div>
            </div>


            <div class="col-12 mt-4 ">
                <div class="card pt-3">
                    <div class="card-body">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th colspan="3">Order Items</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td>
                                            <div class="order-product-info-container d-flex">
                                                <div class="order-detail-img-cont me-2 bg-secondary rounded">
                                                    <img src="../../{{ $orderItem->product->product_img }}" width="50px"
                                                        height="50px" class="rounded" style="object-fit: cover"
                                                        alt="">
                                                </div>
                                                <div class="order-product-info">
                                                    <span
                                                        class="order-product-name">{{ $orderItem->product->product_name }}</span>
                                                    <br>
                                                    <span>₱ {{ $orderItem->product->product_price }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="pt-2">
                                                <span>X {{ $orderItem->quantity }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="pt-2">
                                                <span>{{ $orderItem->price }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <h5 class="text-end me-5">Total: {{ $order->grand_total }}</h5>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
