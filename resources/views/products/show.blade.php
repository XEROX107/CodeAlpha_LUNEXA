@extends('layouts.app')

@section('title', $product->name . ' | Lunexa')

@push('styles')
<style>
    .detail-page {
        color: #171717;
    }

    .detail-breadcrumb {
        margin-bottom: 30px;
        color: #858585;
        font-size: .82rem;
    }

    .detail-breadcrumb a {
        color: #525252;
        text-decoration: none;
    }

    .detail-breadcrumb a:hover {
        color: #000;
        text-decoration: underline;
    }

    .detail-image-wrap {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        min-height: 350px;
        aspect-ratio: 4 / 4.5;
        background: #f7f7f5;
    }

    .detail-image {
        width: 100%;
        height: 100%;
        max-height: 680px;
        object-fit: contain;
    }

    .detail-image-placeholder {
        color: #c4c4c0;
        font-size: 4rem;
    }

    .detail-eyebrow {
        color: #737373;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
    }

    .detail-title {
        margin: 16px 0;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 500;
        letter-spacing: -1.5px;
        line-height: 1.2;
        overflow-wrap: anywhere;
    }

    .detail-price {
        font-size: 1.65rem;
        font-weight: 600;
        letter-spacing: -.5px;
    }

    .detail-divider {
        margin: 25px 0;
        border-color: #e8e8e8;
        opacity: 1;
    }

    .detail-description {
        color: #737373;
        font-size: .94rem;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    .detail-stock {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: .83rem;
    }

    .detail-quantity-label {
        display: block;
        margin-bottom: 10px;
        font-size: .8rem;
        font-weight: 600;
    }

    .detail-quantity {
        max-width: 180px;
    }

    .detail-quantity .form-control,
    .detail-quantity .btn {
        min-height: 46px;
        border-color: #dedede;
        border-radius: 0;
        box-shadow: none;
    }

    .detail-quantity .form-control {
        font-size: .9rem;
    }

    .detail-quantity .btn:hover {
        background: #f5f5f5;
    }

    .detail-add-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        min-height: 52px;
        padding: 13px 20px;
        border: 1px solid #171717;
        border-radius: 0;
        background: #171717;
        color: #fff;
        font-size: .86rem;
        transition: .2s ease;
    }

    .detail-add-button:hover:not(:disabled) {
        background: #fff;
        color: #171717;
    }

    .detail-add-button:disabled {
        cursor: not-allowed;
        opacity: .55;
    }

    .detail-login-button {
        display: block;
        width: 100%;
        padding: 15px;
        border: 1px solid #171717;
        background: #171717;
        color: #fff;
        text-align: center;
        text-decoration: none;
        transition: .2s ease;
    }

    .detail-login-button:hover {
        background: #fff;
        color: #171717;
    }

    .detail-meta {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding: 14px 0;
        border-bottom: 1px solid #eee;
        font-size: .84rem;
    }

    .detail-meta-label {
        color: #858585;
    }

    .detail-meta-value {
        text-align: right;
    }

    .detail-note {
        margin-top: 24px;
        padding: 17px;
        background: #f8f8f6;
        color: #666;
        font-size: .82rem;
        line-height: 1.7;
    }

    @media (max-width: 767.98px) {
        .detail-image-wrap {
            min-height: 280px;
        }

        .detail-title {
            margin-top: 12px;
        }

        .detail-information {
            margin-top: 32px;
        }
    }
</style>
@endpush

@section('content')
<div class="container detail-page py-4 py-md-5">

    {{-- Breadcrumb --}}
    <nav class="detail-breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-2">/</span>
        <a href="{{ route('products.index') }}">Shop</a>

        @if ($product->category)
        <span class="mx-2">/</span>
        <a href="{{ route('categories.show', $product->category->slug) }}">
            {{ $product->category->name }}
        </a>
        @endif

        <span class="mx-2">/</span>
        <span>{{ $product->name }}</span>
    </nav>

    <div class="row g-4 g-lg-5 align-items-start">

        {{-- Product image --}}
        <div class="col-12 col-md-6">
            <div class="detail-image-wrap">

                @if ($product->image)
                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    class="detail-image">
                @else
                <i class="bi bi-image detail-image-placeholder"></i>
                @endif

            </div>
        </div>

        {{-- Product information --}}
        <div class="col-12 col-md-6 detail-information">

            <span class="detail-eyebrow">The Lunexa Collection</span>

            <h1 class="detail-title">
                {{ $product->name }}
            </h1>

            <div class="detail-price">
                ৳{{ number_format((float) $product->price, 2) }}
            </div>

            <hr class="detail-divider">

            {{-- Stock status --}}
            <div class="mb-4">
                @if ($product->stock > 0)
                <span class="detail-stock text-success">
                    <i class="bi bi-check-circle-fill"></i>
                    In stock
                </span>

                <p class="text-muted small mt-2 mb-0">
                    {{ $product->stock }} unit(s) available.
                </p>
                @else
                <span class="detail-stock text-danger">
                    <i class="bi bi-x-circle-fill"></i>
                    Currently out of stock
                </span>
                @endif
            </div>

            {{-- Product description --}}
            <div class="detail-description mb-4">
                @if (filled($product->description))
                {!! nl2br(e($product->description)) !!}
                @else
                Discover this item from the Lunexa collection.
                Contact us if you need more product information.
                @endif
            </div>

            {{-- Cart validation errors --}}
            @if ($errors->has('quantity'))
            <div class="alert alert-danger small" role="alert">
                {{ $errors->first('quantity') }}
            </div>
            @endif

            {{-- Add to cart --}}
            @if ($product->stock > 0)

            @auth
            <form
                action="{{ route('cart.add', $product) }}"
                method="POST"
                class="mb-4">

                @csrf

                <label for="quantity" class="detail-quantity-label">
                    Quantity
                </label>

                <div class="input-group detail-quantity mb-3">
                    <button
                        type="button"
                        class="btn btn-outline-secondary"
                        id="quantity-minus"
                        aria-label="Decrease quantity">
                        −
                    </button>

                    <input
                        type="number"
                        name="quantity"
                        id="quantity"
                        value="{{ old('quantity', 1) }}"
                        min="1"
                        max="{{ $product->stock }}"
                        step="1"
                        inputmode="numeric"
                        required
                        class="form-control text-center"
                        aria-describedby="quantity-help">

                    <button
                        type="button"
                        class="btn btn-outline-secondary"
                        id="quantity-plus"
                        aria-label="Increase quantity">
                        +
                    </button>
                </div>

                <small id="quantity-help" class="text-muted d-block mb-3">
                    Maximum available: {{ $product->stock }}
                </small>

                <button type="submit" class="detail-add-button">
                    <i class="bi bi-bag-plus"></i>
                    Add to Cart
                </button>
            </form>
            @else
            <a
                href="{{ route('login') }}"
                class="detail-login-button mb-4">
                <i class="bi bi-person me-2"></i>
                Login to Add to Cart
            </a>
            @endauth

            @else
            <button type="button" class="detail-add-button mb-4" disabled>
                <i class="bi bi-bag-x"></i>
                Out of Stock
            </button>
            @endif

            {{-- Product metadata --}}
            <div class="detail-meta">
                <span class="detail-meta-label">Category</span>
                <span class="detail-meta-value">
                    {{ $product->category->name ?? 'Uncategorized' }}
                </span>
            </div>

            <div class="detail-meta">
                <span class="detail-meta-label">Availability</span>
                <span class="detail-meta-value">
                    {{ $product->stock > 0 ? 'Available' : 'Unavailable' }}
                </span>
            </div>

            <div class="detail-note">
                <i class="bi bi-shield-check me-2"></i>
                Your order quantity is checked against current stock before
                the item is added to your cart.
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantity = document.getElementById('quantity');
        const minus = document.getElementById('quantity-minus');
        const plus = document.getElementById('quantity-plus');

        if (!quantity || !minus || !plus) {
            return;
        }

        const getLimits = () => ({
            min: Number(quantity.min) || 1,
            max: Number(quantity.max) || 1
        });

        const clampQuantity = () => {
            const {
                min,
                max
            } = getLimits();
            let value = Number.parseInt(quantity.value, 10);

            if (!Number.isFinite(value)) {
                value = min;
            }

            quantity.value = Math.min(max, Math.max(min, value));
            minus.disabled = Number(quantity.value) <= min;
            plus.disabled = Number(quantity.value) >= max;
        };

        minus.addEventListener('click', function() {
            quantity.value = (Number.parseInt(quantity.value, 10) || 1) - 1;
            clampQuantity();
        });

        plus.addEventListener('click', function() {
            quantity.value = (Number.parseInt(quantity.value, 10) || 1) + 1;
            clampQuantity();
        });

        quantity.addEventListener('input', clampQuantity);
        quantity.addEventListener('change', clampQuantity);

        clampQuantity();
    });
</script>
@endpush