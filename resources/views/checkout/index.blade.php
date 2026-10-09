@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="mb-5">
        <h1 class="fw-bold">Checkout</h1>
        <p class="text-muted">Complete your order</p>
    </div>

    <div class="row g-4">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">Shipping Information</h4>

                    <form action="{{ route('checkout.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Shipping Address
                            </label>

                            <textarea
                                name="shipping_address"
                                class="form-control"
                                rows="5"
                                placeholder="Enter your full shipping address"
                                required></textarea>

                            @error('shipping_address')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-dark btn-lg w-100">
                            <i class="bi bi-bag-check"></i>
                            Place Order
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <div class="col-lg-5">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">Order Summary</h4>

                    @foreach($cart->items as $item)

                    <div class="d-flex justify-content-between mb-3">

                        <div>
                            <div class="fw-semibold">
                                {{ $item->product->name }}
                            </div>

                            <small class="text-muted">
                                {{ $item->quantity }} ×
                                ৳{{ number_format($item->product->price, 2) }}
                            </small>
                        </div>

                        <div class="fw-semibold">
                            ৳{{ number_format($item->product->price * $item->quantity, 2) }}
                        </div>

                    </div>

                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between">

                        <span class="fw-bold">
                            Total
                        </span>

                        <span class="fw-bold fs-4">
                            ৳{{ number_format($total, 2) }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection