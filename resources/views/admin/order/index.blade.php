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
        <div class="col-12 dashboard">
            <div class="card recent-sales overflow-auto">
                <div class="card-header">

                    <form action="#" method="get">
                        <div class="row">
                            <div class="col-3">
                                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}"
                                    class="form-control">
                            </div>
                            <div class="col-3">

                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="card-body">

                    <table class="table table-borderless ">
                        {{-- i remove the datatable class to make my own simple filter --}}

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Code</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Ordered Date</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">#{{ $order->id }}</th>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->grand_total }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
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
                                    <td class="position-relative"><a href="{{ route('order.show', $order->id) }}"
                                            class="btn btn-sm btn-primary position-relative">View</a>
                                        <button class="btn btn-sm btn-warning optionsBtn" title="options"><i
                                                class="bi bi-gear-fill"></i></button>
                                        <div class="btn-group-vertical position-absolute top-50 start-0 translate-middle options"
                                            role="group" aria-label="Vertical button group">


                                            <input type="submit" name="orderStatus"
                                                form="updateOrderStatus{{ $order->id }}" class="btn btn-primary"
                                                value='accepted' />
                                            <input type="submit" name="orderStatus"
                                                form="updateOrderStatus{{ $order->id }}" class="btn btn-info"
                                                value='shipped' />
                                            <input type="submit" name="orderStatus"
                                                form="updateOrderStatus{{ $order->id }}" class="btn btn-success"
                                                value='completed' />
                                            <input type="submit" name="orderStatus"
                                                form="updateOrderStatus{{ $order->id }}" class="btn btn-danger"
                                                value='decline' />
                                        </div>
                                        <form action="{{ route('order.update', $order->id) }}" method="post"
                                            id="updateOrderStatus{{ $order->id }}">
                                            @method('PUT')
                                            @csrf
                                        </form>

                                    </td>
                                </tr>



                            @empty
                                <tr class="colspan-7">

                                    <p>No Orders.</p>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        const optionsBtn = document.querySelectorAll('.optionsBtn');

        optionsBtn.forEach(el => {
            el.addEventListener('click', (e) => {
                e.currentTarget.classList.toggle('open');
            })
        });
    </script>
@endpush
