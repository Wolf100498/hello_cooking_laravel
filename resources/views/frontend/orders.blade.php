@extends('layouts.frontend')


@section('content')
    <section class="mb-5">
        <div class="container container-md cart mt-5">
            <h1>My Orders</h1>
            <div class="row px-2">
                <div class="card p-2">
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-table-cell">#</th>
                                    <th>Order Code</th>
                                    <th class="d-none d-md-table-cell">Total</th>
                                    <th class="d-none d-lg-table-cell">Payment Method</th>
                                    <th class="d-none d-md-table-cell">Ordered Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td class="d-none d-sm-table-cell">{{ $order->id }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td class="d-none d-md-table-cell">{{ $order->grand_total }}</td>
                                        <td class="d-none d-lg-table-cell">{{ $order->payment_method }}</td>
                                        <td class="d-none d-md-table-cell">{{ $order->created_at->format('d-m-Y') }}</td>
                                        <td
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
                                        ">
                                            {{ $order->status }}</td>
                                        <td><a href="{{ url('order/' . $order->id) }}"
                                                class="btn btn-sm btn-primary">View</a>
                                        </td>
                                    </tr>



                                @empty
                                    <tr class="colspan-7">

                                        <p>No Orders.</p>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
