@extends('layouts.app')

@section('title', $category->name . ' - Lunexa')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <span class="category-badge">
            {{ $category->name }}
        </span>

        <h1 class="fw-bold mt-3">
            {{ $category->name }}
        </h1>

        <p class="text-muted">
            {{ $category->description }}
        </p>

    </div>

    <div class="row g-4">

        @forelse($products as $product)

        <div class="col-sm-6 col-lg-3">

            <div class="card product-card h-100">

                <div class="product-image">

                    @if($product->image)

                    <img src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="img-fluid w-100 h-100"
                        style="object-fit: cover;">

                    @else

                    <i class="bi bi-image"></i>

                    @endif

                </div>

                <div class="card-body p-4">

                    <span class="category-badge">
                        {{ $category->name }}
                    </span>

                    <h5 class="product-name mt-3">
                        {{ $product->name }}
                    </h5>

                    <p class="text-muted small">
                        {{ \Illuminate\Support\Str::limit($product->description, 70) }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center">

                        <span class="product-price">
                            ৳{{ number_format($product->price, 2) }}
                        </span>

                        @if($product->stock > 0)

                        <small class="text-success">
                            In Stock
                        </small>

                        @else

                        <small class="text-danger">
                            Out of Stock
                        </small>

                        @endif

                    </div>

                    <a href="{{ route('products.show', $product->slug) }}"
                        class="btn btn-lunexa w-100 mt-3">

                        View Product

                        <i class="bi bi-arrow-right ms-1"></i>

                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center py-5">

            <h4>No products found</h4>

            <p class="text-muted">
                There are currently no products in this category.
            </p>

        </div>

        @endforelse

    </div>

</div>

@endsection