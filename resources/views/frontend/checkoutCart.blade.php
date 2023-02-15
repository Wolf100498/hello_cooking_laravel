@extends('layouts.frontend')


@section('content')
    <section>
        @if (session('danger'))
            <div x-data="{ open: true }" x-init='setTimeout(() => open = false, 2000)' x-show="open"
                x-transition.duration.600ms class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container-md cart">
            <h3 class="mt-5">Checkout</h3>
            <div class="row">
                <div class="py-3 py-md-4 checkout">
                    <div class="container">

                        <div class="row mb-4">
                            <div class="col-md-7">
                                <div class="shadow bg-white p-3">
                                    <h4 class="text-primary">
                                        Basic Information
                                    </h4>
                                    <hr>
                                    <form action="{{ route('requestpayment') }}" method='post' id="paypalform">

                                        @csrf
                                        <input type="hidden" name="grandTotal" value="{{ $totalCartAmount }}">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Full Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Full Name" id="fullname" required />
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Phone Number</label>
                                                <input type="number" name="phone" class="form-control"
                                                    placeholder="Phone Number" id="phoneNumber" required />
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Email Address</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="Email" required />
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label>Full Address</label>
                                                <textarea name="address" class="form-control" rows="2" placeholder="Address" id="address" required></textarea>
                                                @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label>Select Payment Mode: </label>
                                                <div class="d-md-flex align-items-start">
                                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                                        role="tablist" aria-orientation="vertical">
                                                        <button class="nav-link fw-bold active" id="cashOnDeliveryTab-tab"
                                                            data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab"
                                                            type="button" role="tab" aria-controls="cashOnDeliveryTab"
                                                            aria-selected="true">Cash on Delivery</button>
                                                        <button class="nav-link fw-bold" id="onlinePayment-tab"
                                                            data-bs-toggle="pill" data-bs-target="#onlinePayment"
                                                            type="button" role="tab" aria-controls="onlinePayment"
                                                            aria-selected="false">Online Payment</button>
                                                    </div>
                                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                        <div class="tab-pane fade active show" id="cashOnDeliveryTab"
                                                            role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab"
                                                            tabindex="0">
                                                            <h6>Cash on Delivery Mode</h6>
                                                            <hr />
                                                            <input type="submit" class="btn btn-warning"
                                                                value='CashOnDelivery' name="mode" />

                                                        </div>
                                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                            aria-labelledby="onlinePayment-tab" tabindex="0">
                                                            <h6>Online Payment Mode</h6>
                                                            <hr />
                                                            <input type="submit" class="btn btn-warning" value='PayPal'
                                                                name="mode" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="shadow bg-white p-3">
                                    <h4 class="text-primary">
                                        Item Total Amount :
                                        <span class="float-end">&#8369; {{ $totalCartAmount }}</span>
                                    </h4>
                                    <hr>

                                    <div class="">
                                        @foreach ($cartItems as $details)
                                            <div class="d-flex position-relative">
                                                <div class="checkout-prod-info p-2">
                                                    <h4>{{ $details['product_name'] }}</h4>
                                                    <p class="text-secondary">Good for: 2</p>
                                                    <p class="text-secondary">Quantity: {{ $details['quantity'] }} </p>
                                                    <p>&#8369; {{ $details['product_price'] }}.00</p>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
