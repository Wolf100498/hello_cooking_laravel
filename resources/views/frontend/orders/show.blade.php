@extends('layouts.frontend')


@section('content')
    {{-- <livewire:frontend.orders.order-index /> --}}

    <section class="mb-5">
        <div class="container container-md cart mt-5">
            <h1>My Order Details</h1>

            <div class="row ">
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <div class="card  h-100">
                        <div class="card-body">
                            <h5>Order Details</h5>
                            <hr>
                            <p>Order Code: {{ $order->order_number }}</p>
                            <p>Payment Mode: {{ $order->payment_method }}</p>
                            <p>Order Status: <span
                                    class="fw-bolder 
                                @php
if($order->status == 'pending'){
                                                    echo 'text-info';
                                                }
                                                elseif($order->status == 'completed'){
                                                    echo 'text-success';
                                                }
                                                elseif($order->status == 'accepted'){
                                                    echo 'text-success';
                                                }
                                                elseif($order->status == 'shipped'){
                                                    echo 'text-warning';
                                                }
                                                elseif($order->status == 'decline'){
                                                    echo 'text-danger';
                                                } @endphp
                                ">{{ $order->status }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
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


                <div class="col-12 mt-4">
                    <div class="card">
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
                                                <div class="order-product-info-container">
                                                    <div class="order-detail-img-cont d-none d-sm-block">
                                                        <img src="../{{ $orderItem->product->product_img }}" width="50px"
                                                            height="50px" alt="">
                                                    </div>
                                                    <div class="order-product-info">
                                                        <span
                                                            class="order-product-name">{{ $orderItem->product->product_name }}</span>
                                                        <span>₱ {{ $orderItem->product->product_price }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span>X {{ $orderItem->quantity }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span>{{ $orderItem->price }}</span>
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
        </div>
    </section>
@endsection
