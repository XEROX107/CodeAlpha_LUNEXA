@extends('layouts.app')

@section('title', 'Shop | Lunexa')

@push('styles')
<style>
    .shop-page {
        color: #171717;
    }

    .shop-eyebrow {
        display: inline-block;
        color: #737373;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: 3px;
    }

    .shop-heading {
        font-size: clamp(2rem, 4vw, 3.3rem);
        font-weight: 500;
        letter-spacing: -1.8px;
    }

    .shop-description {
        color: #737373;
        font-size: .95rem;
        line-height: 1.8;
    }

    .shop-filter-panel {
        padding: 22px;
        border: 1px solid #eaeaea;
        background: #fff;
    }

    .shop-filter-panel label {
        margin-bottom: 7px;
        color: #525252;
        font-size: .78rem;
        font-weight: 600;
    }

    .shop-filter-panel .form-control,
    .shop-filter-panel .form-select {
        min-height: 43px;
        border-color: #e5e5e5;
        border-radius: 2px;
        font-size: .85rem;
        box-shadow: none;
    }

    .shop-filter-panel .form-control:focus,
    .shop-filter-panel .form-select:focus {
        border-color: #737373;
    }

    .shop-button {
        min-height: 43px;
        padding: 10px 17px;
        border: 1px solid #171717;
        border-radius: 2px;
        background: #171717;
        color: #fff;
        font-size: .82rem;
        transition: .2s ease;
    }

    .shop-button:hover {
        background: #fff;
        color: #171717;
    }

    .shop-reset {
        display: inline-flex;
        align-items: center;
        min-height: 43px;
        color: #525252;
        font-size: .82rem;
        text-decoration: none;
    }

    .shop-reset:hover {
        color: #000;
        text-decoration: underline;
    }

    .shop-results {
        color: #737373;
        font-size: .84rem;
    }

    .luxury-product-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid #eee;
        background: #fff;
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .luxury-product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, .06);
    }

    .luxury-product-image {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        aspect-ratio: 4 / 4.5;
        background: #f7f7f5;
    }

    .luxury-product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .45s ease;
    }

    .luxury-product-card:hover .luxury-product-image img {
        transform: scale(1.04);
    }

    .luxury-image-placeholder {
        color: #c4c4c0;
        font-size: 2.5rem;
    }

    .luxury-stock-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        padding: 6px 9px;
        background: rgba(255, 255, 255, .94);
        color: #404040;
        font-size: .68rem;
    }

    .luxury-stock-badge.out {
        background: #171717;
        color: #fff;
    }

    .luxury-product-info {
        padding: 19px;
    }

    .luxury-category {
        color: #858585;
        font-size: .7rem;
        letter-spacing: 1.3px;
        text-transform: uppercase;
    }

    .luxury-product-name {
        margin: 9px 0;
        font-size: 1rem;
        font-weight: 500;
        line-height: 1.5;
    }

    .luxury-product-name a {
        color: #171717;
        text-decoration: none;
    }

    .luxury-product-name a:hover {
        text-decoration: underline;
        text-underline-offset: 4px;
    }

    .luxury-product-description {
        min-height: 40px;
        color: #858585;
        font-size: .8rem;
        line-height: 1.6;
    }

    .luxury-product-price {
        font-size: 1.05rem;
        font-weight: 600;
        letter-spacing: -.3px;
    }

    .luxury-view-button {
        display: block;
        width: 100%;
        margin-top: 16px;
        padding: 11px;
        border: 1px solid #171717;
        background: #171717;
        color: #fff;
        font-size: .8rem;
        text-align: center;
        text-decoration: none;
        transition: .2s ease;
    }

    .luxury-view-button:hover {
        background: #fff;
        color: #171717;
    }

    .shop-empty-state {
        padding: 60px 20px;
        border: 1px solid #eee;
        text-align: center;
    }

    .shop-empty-state i {
        color: #a3a3a3;
        font-size: 2rem;
    }

    .shop-empty-state h3 {
        margin-top: 18px;
        font-size: 1.3rem;
        font-weight: 500;
    }

    .shop-pagination nav {
        display: flex;
        justify-content: center;
    }

    .shop-pagination .page-link {
        border-radius: 0 !important;
        color: #171717;
    }

    .shop-pagination .active>.page-link {
        border-color: #171717;
        background: #171717;
        color: #fff;
    }

    @media (max-width: 575.98px) {
        .shop-filter-panel {
            padding: 16px;
        }

        .luxury-product-info {
            padding: 13px;
        }

        .luxury-product-name {
            font-size: .92rem;
        }

        .luxury-product-price {
            font-size: .96rem;
        }
    }
</style>
@endpush

@section('content')
<div class="container shop-page py-5">

    {{-- Page heading --}}
    <header class="text-center mb-5">
        <span class="shop-eyebrow">THE LUNEXA COLLECTION</span>

        <h1 class="shop-heading mt-3 mb-3">
            Discover Better.
        </h1>

        <p class="shop-description mb-0">
            Thoughtfully selected essentials for your everyday life.
        </p>
    </header>

    {{-- Search and filters --}}
    <form action="{{ route('products.index') }}"
        method="GET"
        class="shop-filter-panel mb-4">

        <div class="row g-3 align-items-end">

            <div class="col-12 col-md-6 col-lg-4">
                <label for="search">Search products</label>
                <input
                    type="search"
                    id="search"
                    name="search"
                    class="form-control"
                    placeholder="Search by name or description"
                    value="{{ $search }}">
            </div>

            <div class="col-12 col-sm-6 col-lg-2">
                <label for="category">Category</label>
                <select id="category" name="category" class="form-select">
                    <option value="">All categories</option>

                    @foreach ($categories as $category)
                    <option
                        value="{{ $category->slug }}"
                        @selected(($filters['category'] ?? '' )===$category->slug)>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 col-sm-3 col-lg-2">
                <label for="min_price">Min price (৳)</label>
                <input
                    type="number"
                    id="min_price"
                    name="min_price"
                    class="form-control"
                    min="0"
                    step="0.01"
                    placeholder="0"
                    value="{{ $filters['min_price'] ?? '' }}">
            </div>

            <div class="col-6 col-sm-3 col-lg-2">
                <label for="max_price">Max price (৳)</label>
                <input
                    type="number"
                    id="max_price"
                    name="max_price"
                    class="form-control"
                    min="0"
                    step="0.01"
                    placeholder="Any"
                    value="{{ $filters['max_price'] ?? '' }}">
            </div>

            <div class="col-12 col-sm-6 col-lg-2">
                <label for="sort">Sort by</label>
                <select id="sort" name="sort" class="form-select">
                    <option value="latest" @selected(($filters['sort'] ?? 'latest' )==='latest' )>
                        Newest
                    </option>
                    <option value="price_asc" @selected(($filters['sort'] ?? '' )==='price_asc' )>
                        Price: Low to High
                    </option>
                    <option value="price_desc" @selected(($filters['sort'] ?? '' )==='price_desc' )>
                        Price: High to Low
                    </option>
                    <option value="name_asc" @selected(($filters['sort'] ?? '' )==='name_asc' )>
                        Name: A–Z
                    </option>
                </select>
            </div>

            <div class="col-12 d-flex flex-wrap align-items-center gap-3">
                <button type="submit" class="shop-button">
                    <i class="bi bi-sliders2 me-1"></i>
                    Apply Filters
                </button>

                <a href="{{ route('products.index') }}" class="shop-reset">
                    Clear filters
                </a>
            </div>
        </div>
    </form>

    {{-- Result count --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <p class="shop-results mb-0">
            Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}
            of {{ $products->total() }} products
        </p>

        @if ($search !== '')
        <p class="shop-results mb-0">
            Search: <strong>{{ $search }}</strong>
        </p>
        @endif
    </div>

    {{-- Product grid --}}
    @if ($products->isEmpty())

    <div class="shop-empty-state">
        <i class="bi bi-search"></i>

        <h3>No products found</h3>

        <p class="shop-description">
            Try another search or adjust your filters to discover more products.
        </p>

        <a href="{{ route('products.index') }}" class="shop-button d-inline-block text-decoration-none">
            View all products
        </a>
    </div>

    @else

    <div class="row g-3 g-md-4">
        @foreach ($products as $product)
        <div class="col-6 col-lg-4 col-xl-3">

            <article class="luxury-product-card">

                <a
                    href="{{ route('products.show', $product->slug) }}"
                    class="luxury-product-image text-decoration-none"
                    aria-label="View {{ $product->name }}">

                    @if ($product->image)
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        loading="lazy">
                    @else
                    <i class="bi bi-image luxury-image-placeholder"></i>
                    @endif

                    @if ($product->stock > 0)
                    <span class="luxury-stock-badge">
                        In stock
                    </span>
                    @else
                    <span class="luxury-stock-badge out">
                        Sold out
                    </span>
                    @endif
                </a>

                <div class="luxury-product-info">

                    <span class="luxury-category">
                        {{ $product->category->name ?? 'Uncategorized' }}
                    </span>

                    <h2 class="luxury-product-name">
                        <a href="{{ route('products.show', $product->slug) }}">
                            {{ $product->name }}
                        </a>
                    </h2>

                    <p class="luxury-product-description mb-3">
                        {{ \Illuminate\Support\Str::limit($product->description ?? '', 65) }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <span class="luxury-product-price">
                            ৳{{ number_format((float) $product->price, 2) }}
                        </span>

                        @if ($product->stock > 0)
                        <span class="text-success small" title="Available">
                            <i class="bi bi-check-circle"></i>
                        </span>
                        @else
                        <span class="text-danger small">
                            Unavailable
                        </span>
                        @endif
                    </div>

                    <a
                        href="{{ route('products.show', $product->slug) }}"
                        class="luxury-view-button">
                        View Details
                        <i class="bi bi-arrow-up-right ms-1"></i>
                    </a>
                </div>
            </article>

        </div>
        @endforeach
    </div>

    <div class="shop-pagination mt-5">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

    @endif
</div>
@endsection