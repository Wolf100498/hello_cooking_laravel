@extends('layouts.frontend')


@section('content')
    <section>
        <div class="container-md cart">
            <h1>Shopping Cart</h1>
            <div class="row">
                @if (sizeOf(session('cart')))
                    <div class="col-lg-8">

                        @foreach (session('cart') as $id => $details)
                            <div class="box">
                                <div class="box-img-container">
                                    <img src="{{ asset($details['product_img']) }}" alt="" />
                                </div>
                                <div class="content">
                                    <div class="d-flex">
                                        <h3>{{ $details['product_name'] }}</h3>
                                        <p>Price: {{ $details['product_price'] }}.00</p>

                                        <form action={{ route('cart.update') }} onchange="submit()" method="get">
                                            @csrf
                                            <input type="hidden" name="product_id" value={{ $details['product_id'] }}>
                                            <label for="quantity">Qty.</label>
                                            <input type="number" name="quantity" value="{{ $details['quantity'] }}"
                                                class="p-1 w-25">
                                        </form>
                                    </div>

                                    <form action="{{ route('cart.destroy', $details['product_id']) }}" method="POST">
                                        @csrf
                                        <button class="btn-area" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="col-lg-4 ms-auto mb-3">
                        <div class="right-bar">
                            <div>
                                <p>Total :</p>
                                <p>₱<span class="subtotal">{{ $totalCartAmount }}</span></p>
                            </div>

                            @guest()
                                <a class="sana-all-button text-center" href={{ route('login') }}>Login Requied</a>
                            @endguest
                            @auth
                                <a class="sana-all-button text-center" href={{ route('paymentindex') }}>
                                    <i class="fa-solid fa-cart-shopping"></i>Checkout
                                </a>
                            @endauth
                        </div>
                    </div>
                @else
                    <div class="text-center">

                        <p>No item in cart. <a href="/recipes">Order now</a></p>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
