@extends('layouts.app')

@section('title', 'Categories - Lunexa')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <span class="category-badge">
            EXPLORE LUNEXA
        </span>

        <h1 class="fw-bold mt-3">
            Shop by Category
        </h1>

        <p class="text-muted">
            Find products that match your lifestyle.
        </p>

    </div>

    <div class="row g-4">

        @foreach($categories as $category)

        <div class="col-sm-6 col-lg-3">

            <div class="card product-card h-100">

                <div class="product-image">

                    <i class="bi bi-grid-3x3-gap"></i>

                </div>

                <div class="card-body text-center p-4">

                    <h4 class="fw-bold">
                        {{ $category->name }}
                    </h4>

                    <p class="text-muted">
                        {{ $category->description }}
                    </p>

                    <p class="small text-muted">
                        {{ $category->products_count }} Products
                    </p>

                    <a href="{{ route('categories.show', $category->slug) }}"
                        class="btn btn-lunexa w-100">

                        Explore Category

                        <i class="bi bi-arrow-right ms-1"></i>

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection