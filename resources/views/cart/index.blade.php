@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <h1 class="fw-bold">Shopping Cart</h1>
        <p class="text-muted">Review your selected products.</p>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($cart->items->count())

    <div class="row g-4">

        <div class="col-lg-8">

            @foreach($cart->items as $item)

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col-md-2">

                            @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                class="img-fluid rounded"
                                alt="{{ $item->product->name }}">
                            @else
                            <div class="bg-light rounded p-4 text-center">
                                <i class="bi bi-image fs-2 text-muted"></i>
                            </div>
                            @endif

                        </div>

                        <div class="col-md-4">

                            <h5 class="fw-bold">
                                {{ $item->product->name }}
                            </h5>

                            <p class="text-muted mb-0">
                                {{ $item->product->category->name }}
                            </p>

                            <p class="fw-bold mt-2 mb-0">
                                ৳{{ number_format($item->product->price, 2) }}
                            </p>

                        </div>

                        <div class="col-md-3">

                            <form action="{{ route('cart.update', $item) }}"
                                method="POST">

                                @csrf
                                @method('PUT')

                                <div class="input-group">

                                    <input type="number"
                                        name="quantity"
                                        value="{{ $item->quantity }}"
                                        min="1"
                                        class="form-control">

                                    <button class="btn btn-outline-dark">
                                        Update
                                    </button>

                                </div>

                            </form>

                        </div>

                        <div class="col-md-2">

                            <strong>
                                ৳{{ number_format($item->product->price * $item->quantity, 2) }}
                            </strong>

                        </div>

                        <div class="col-md-1">

                            <form action="{{ route('cart.remove', $item) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>

                        </div>

                    </div>

                </div>
            </div>

            @endforeach

        </div>

        <div class="col-lg-4">

            @php
            $total = $cart->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
            });
            @endphp

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Order Summary
                    </h4>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <strong>৳{{ number_format($total, 2) }}</strong>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <strong>Free</strong>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-4">

                        <span class="fw-bold">
                            Total
                        </span>

                        <strong class="fs-4">
                            ৳{{ number_format($total, 2) }}
                        </strong>

                    </div>

                    <a href="{{ route('checkout.index') }}"
                        class="btn btn-dark w-100 btn-lg">
                        Proceed to Checkout
                    </a>

                </div>

            </div>

        </div>

    </div>

    @else

    <div class="text-center py-5">

        <i class="bi bi-cart-x display-1 text-muted"></i>

        <h3 class="mt-4">
            Your cart is empty
        </h3>

        <p class="text-muted">
            Start shopping and add some products.
        </p>

        <a href="{{ route('products.index') }}"
            class="btn btn-dark">
            Continue Shopping
        </a>

    </div>

    @endif

</div>

@endsection