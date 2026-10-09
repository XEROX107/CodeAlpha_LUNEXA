@extends('layouts.app')

@section('title', 'Lunexa | Discover Better.')

@section('meta_description', 'Discover thoughtfully selected fashion, electronics, accessories, and lifestyle products at Lunexa.')

@push('styles')
<style>
    .luxury-home {
        --lx-black: #171717;
        --lx-muted: #737373;
        --lx-border: #e8e6e1;
        --lx-cream: #f5f3ef;
        background: #fff;
        color: var(--lx-black);
        overflow: hidden;
    }

    .luxury-home a {
        color: inherit;
        text-decoration: none;
    }

    .luxury-container {
        width: min(1320px, 100%);
        margin: 0 auto;
        padding-inline: 28px;
    }

    .luxury-eyebrow {
        color: var(--lx-muted);
        font-size: .7rem;
        font-weight: 700;
        letter-spacing: 2.2px;
        text-transform: uppercase;
    }

    .luxury-title,
    .luxury-section-heading,
    .luxury-cta h2 {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 400;
        letter-spacing: -1.4px;
    }

    .luxury-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        min-height: 50px;
        padding: 14px 22px;
        border: 1px solid var(--lx-black);
        background: var(--lx-black);
        color: #fff !important;
        font-size: .78rem;
        font-weight: 700;
        transition: background .25s, color .25s, transform .25s;
    }

    .luxury-button:hover {
        transform: translateY(-2px);
        background: #fff;
        color: var(--lx-black) !important;
    }

    .luxury-button-light {
        border-color: #fff;
        background: #fff;
        color: var(--lx-black) !important;
    }

    .luxury-button-light:hover {
        border-color: #fff;
        background: transparent;
        color: #fff !important;
    }

    .luxury-text-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: .8rem;
        font-weight: 700;
    }

    .luxury-text-link i {
        transition: transform .2s;
    }

    .luxury-text-link:hover i {
        transform: translateX(4px);
    }

    /* HERO */
    .luxury-hero {
        padding-block: 48px 55px;
    }

    .luxury-hero-copy {
        padding: 35px 0;
    }

    .luxury-title {
        max-width: 650px;
        margin: 22px 0;
        font-size: clamp(3.3rem, 6.5vw, 6.1rem);
        line-height: .99;
    }

    .luxury-title em {
        font-weight: 400;
    }

    .luxury-description {
        max-width: 460px;
        color: var(--lx-muted);
        font-size: .96rem;
        line-height: 1.9;
    }

    .luxury-hero-image {
        position: relative;
        min-height: 510px;
        height: 100%;
        overflow: hidden;
        background: var(--lx-cream);
    }

    .luxury-hero-image img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .8s ease;
    }

    .luxury-hero-image:hover img {
        transform: scale(1.035);
    }

    .luxury-hero-image::after {
        position: absolute;
        inset: 35% 0 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, .48));
        content: "";
        pointer-events: none;
    }

    .luxury-hero-caption {
        position: absolute;
        z-index: 1;
        right: 24px;
        bottom: 22px;
        left: 24px;
        display: flex;
        justify-content: space-between;
        gap: 12px;
        color: #fff;
        font-size: .65rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .luxury-image-credit {
        color: inherit;
        text-decoration: underline !important;
        text-underline-offset: 3px;
    }

    /* BENEFITS STRIP */
    .luxury-benefits {
        border-block: 1px solid var(--lx-border);
    }

    .luxury-benefit {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 11px;
        padding: 22px 8px;
        color: #404040;
        font-size: .76rem;
    }

    .luxury-benefit i {
        font-size: 1.1rem;
    }

    /* SHARED SECTION */
    .luxury-section {
        padding-top: 84px;
    }

    .luxury-section-heading {
        margin: 10px 0;
        font-size: clamp(2.1rem, 4vw, 3.3rem);
        line-height: 1.12;
    }

    .luxury-muted {
        color: var(--lx-muted);
        font-size: .88rem;
        line-height: 1.85;
    }

    .luxury-section-top {
        margin-bottom: 28px;
    }

    /* CATEGORY IMAGE CARDS */
    .luxury-category {
        position: relative;
        display: flex;
        min-height: 280px;
        height: 100%;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
        padding: 20px;
        background: #e9e6df;
        color: #fff !important;
        isolation: isolate;
    }

    .luxury-category::before {
        position: absolute;
        z-index: -2;
        inset: 0;
        background-image: var(--category-image);
        background-position: center;
        background-size: cover;
        transition: transform .6s ease;
        content: "";
    }

    .luxury-category::after {
        position: absolute;
        z-index: -1;
        inset: 0;
        background: linear-gradient(180deg,
                rgba(0, 0, 0, .08) 0%,
                rgba(0, 0, 0, .02) 35%,
                rgba(0, 0, 0, .72) 100%);
        content: "";
    }

    .luxury-category:hover::before {
        transform: scale(1.06);
    }

    .luxury-category-number {
        align-self: flex-start;
        padding: 7px 9px;
        border: 1px solid rgba(255, 255, 255, .45);
        background: rgba(0, 0, 0, .12);
        font-size: .62rem;
        letter-spacing: 1.1px;
    }

    .luxury-category-name {
        max-width: 90%;
        margin: 0;
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(1.3rem, 2vw, 1.8rem);
        font-weight: 400;
        overflow-wrap: anywhere;
    }

    .luxury-category-bottom {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 10px;
    }

    .luxury-category-arrow {
        display: inline-flex;
        width: 36px;
        height: 36px;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, .7);
        border-radius: 50%;
        transition: background .25s, color .25s;
    }

    .luxury-category:hover .luxury-category-arrow {
        background: #fff;
        color: #171717;
    }

    /* PRODUCT CARDS */
    .luxury-product {
        height: 100%;
        background: #fff;
    }

    .luxury-product-image {
        position: relative;
        display: block;
        aspect-ratio: 4 / 4.8;
        overflow: hidden;
        background: #f5f4f1;
    }

    .luxury-product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .luxury-product:hover .luxury-product-image img {
        transform: scale(1.045);
    }

    .luxury-product-label {
        position: absolute;
        top: 12px;
        left: 12px;
        padding: 7px 9px;
        background: #fff;
        color: #171717;
        font-size: .59rem;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
    }

    .luxury-product-info {
        padding: 16px 2px 8px;
    }

    .luxury-product-category {
        margin-bottom: 7px;
        color: var(--lx-muted);
        font-size: .63rem;
        font-weight: 700;
        letter-spacing: 1.1px;
        text-transform: uppercase;
    }

    .luxury-product-name {
        min-height: 42px;
        margin-bottom: 9px;
        color: var(--lx-black);
        font-size: .89rem;
        font-weight: 600;
        line-height: 1.5;
    }

    .luxury-product-price {
        font-size: .94rem;
        font-weight: 700;
    }

    .luxury-stock {
        color: #737373;
        font-size: .68rem;
    }

    .luxury-product-action {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 12px;
        padding-bottom: 4px;
        border-bottom: 1px solid #171717;
        font-size: .72rem;
        font-weight: 700;
    }

    .luxury-empty {
        padding: 35px 20px;
        border: 1px solid var(--lx-border);
        color: var(--lx-muted);
        text-align: center;
    }

    /* PROMOTIONAL IMAGE SECTION */
    .luxury-editorial {
        position: relative;
        display: flex;
        min-height: 380px;
        align-items: center;
        overflow: hidden;
        margin-top: 85px;
        padding: 55px;
        background: #242321;
        color: #fff;
        isolation: isolate;
    }

    .luxury-editorial::before {
        position: absolute;
        z-index: -2;
        inset: 0;
        background-image: url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1800&q=85');
        background-position: center 45%;
        background-size: cover;
        content: "";
    }

    .luxury-editorial::after {
        position: absolute;
        z-index: -1;
        inset: 0;
        background: linear-gradient(90deg, rgba(0, 0, 0, .78), rgba(0, 0, 0, .28));
        content: "";
    }

    .luxury-editorial-content {
        max-width: 570px;
    }

    .luxury-editorial .luxury-eyebrow,
    .luxury-editorial .luxury-muted {
        color: #ededed;
    }

    .luxury-editorial h2 {
        margin: 15px 0;
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(2.5rem, 5vw, 4.3rem);
        font-weight: 400;
        letter-spacing: -1.5px;
        line-height: 1.05;
    }

    /* CLOSING CTA */
    .luxury-cta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        margin-top: 85px;
        padding: 48px;
        border: 1px solid var(--lx-border);
        background: #f8f7f4;
    }

    .luxury-cta h2 {
        margin: 10px 0;
        font-size: clamp(2rem, 4vw, 3rem);
    }

    @media (max-width: 991.98px) {
        .luxury-hero-image {
            min-height: 420px;
        }

        .luxury-category {
            min-height: 235px;
        }

        .luxury-benefit {
            justify-content: flex-start;
        }
    }

    @media (max-width: 767.98px) {
        .luxury-container {
            padding-inline: 20px;
        }

        .luxury-hero {
            padding-block: 28px 40px;
        }

        .luxury-hero-copy {
            padding: 15px 0 8px;
        }

        .luxury-title {
            font-size: clamp(3.1rem, 13vw, 4.5rem);
            letter-spacing: -1.8px;
        }

        .luxury-hero-image {
            min-height: 350px;
        }

        .luxury-section {
            padding-top: 58px;
        }

        .luxury-benefit {
            padding: 16px 3px;
            font-size: .69rem;
        }

        .luxury-category {
            min-height: 205px;
            padding: 14px;
        }

        .luxury-category-name {
            font-size: 1.2rem;
        }

        .luxury-product-info {
            padding-top: 12px;
        }

        .luxury-product-name {
            min-height: 40px;
            font-size: .81rem;
        }

        .luxury-product-price {
            font-size: .85rem;
        }

        .luxury-stock {
            display: none;
        }

        .luxury-editorial {
            min-height: 340px;
            margin-top: 58px;
            padding: 30px 23px;
        }

        .luxury-cta {
            align-items: flex-start;
            flex-direction: column;
            margin-top: 58px;
            padding: 30px 23px;
        }
    }

    @media (max-width: 380px) {
        .luxury-category {
            min-height: 175px;
        }

        .luxury-category-number {
            font-size: .55rem;
        }

        .luxury-product-action {
            font-size: .66rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .luxury-home *,
        .luxury-home *::before,
        .luxury-home *::after {
            scroll-behavior: auto !important;
            animation: none !important;
            transition: none !important;
        }
    }
</style>
@endpush

@section('content')

<div class="luxury-home">

    {{-- HERO: Replace this Unsplash URL with your own image whenever you like. --}}
    <section class="luxury-hero">
        <div class="luxury-container">
            <div class="row align-items-center g-4 g-lg-5">

                <div class="col-lg-6">
                    <div class="luxury-hero-copy">
                        <p class="luxury-eyebrow mb-0">The Lunexa Collection</p>

                        <h1 class="luxury-title">
                            Less, but<br>
                            <em>better.</em>
                        </h1>

                        <p class="luxury-description">
                            Thoughtful finds for everyday living.
                            Discover fashion, technology, accessories,
                            and essentials selected to make every day feel better.
                        </p>

                        <div class="d-flex flex-wrap align-items-center gap-4 mt-4">
                            <a href="{{ route('products.index') }}" class="luxury-button">
                                Explore the Collection
                                <i class="bi bi-arrow-up-right"></i>
                            </a>

                            <a href="{{ route('categories.index') }}" class="luxury-text-link">
                                Browse Categories
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="luxury-hero-image">
                        <img
                            src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1400&q=85"
                            alt="Modern fashion and lifestyle retail collection"
                            fetchpriority="high">

                        <div class="luxury-hero-caption">
                            <span>Thoughtfully Selected</span>
                            <a class="luxury-image-credit"
                                href="https://unsplash.com/s/photos/lifestyle-product"
                                target="_blank" rel="noopener noreferrer">
                                Image source
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- BRAND BENEFITS --}}
    <section class="luxury-benefits">
        <div class="luxury-container">
            <div class="row g-0">

                <div class="col-6 col-lg-3">
                    <div class="luxury-benefit">
                        <i class="bi bi-box-seam"></i>
                        <span>Everyday Essentials</span>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="luxury-benefit">
                        <i class="bi bi-grid"></i>
                        <span>Curated Collections</span>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="luxury-benefit">
                        <i class="bi bi-phone"></i>
                        <span>Easy Online Shopping</span>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="luxury-benefit">
                        <i class="bi bi-bag-check"></i>
                        <span>Made for Everyday</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CATEGORY CARDS: Choose an image based on the category name or slug. --}}
    @isset($categories)
    @if($categories->isNotEmpty())
    <section class="luxury-section">
        <div class="luxury-container">

            <div class="luxury-section-top d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3">
                <div>
                    <p class="luxury-eyebrow mb-2">Explore the Edit</p>
                    <h2 class="luxury-section-heading">Shop by Category</h2>
                    <p class="luxury-muted mb-0">Find what fits your everyday.</p>
                </div>

                <a href="{{ route('categories.index') }}" class="luxury-text-link">
                    View All Categories
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="row g-3">
                @foreach($categories->take(8) as $category)
                @php
                $categoryText = strtolower($category->name . ' ' . $category->slug);

                if (str_contains($categoryText, 'fashion') || str_contains($categoryText, 'cloth')) {
                $categoryImage = 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=900&q=80';
                } elseif (str_contains($categoryText, 'electronic') || str_contains($categoryText, 'tech') || str_contains($categoryText, 'gadget')) {
                $categoryImage = 'https://images.unsplash.com/photo-1498049794561-7780e7231661?auto=format&fit=crop&w=900&q=80';
                } elseif (str_contains($categoryText, 'accessor') || str_contains($categoryText, 'watch') || str_contains($categoryText, 'jewel')) {
                $categoryImage = 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=900&q=80';
                } elseif (str_contains($categoryText, 'shoe') || str_contains($categoryText, 'footwear')) {
                $categoryImage = 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80';
                } elseif (str_contains($categoryText, 'beauty') || str_contains($categoryText, 'skin')) {
                $categoryImage = 'https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=900&q=80';
                } elseif (str_contains($categoryText, 'home') || str_contains($categoryText, 'living')) {
                $categoryImage = 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=900&q=80';
                } else {
                $categoryImage = 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80';
                }
                @endphp

                <div class="col-6 col-md-4 col-lg-3">
                    <a
                        href="{{ route('categories.show', $category->slug) }}"
                        class="luxury-category"
                        style="--category-image: url('{{ $categoryImage }}');">

                        <span class="luxury-category-number">
                            CATEGORY {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <div class="luxury-category-bottom">
                            <h3 class="luxury-category-name">{{ $category->name }}</h3>
                            <span class="luxury-category-arrow">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    @endif
    @endisset

    {{-- FEATURED PRODUCTS: Use database images, then fallback images if missing. --}}
    @isset($products)
    @if($products->isNotEmpty())
    <section class="luxury-section">
        <div class="luxury-container">

            <div class="luxury-section-top d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3">
                <div>
                    <p class="luxury-eyebrow mb-2">Selected for You</p>
                    <h2 class="luxury-section-heading">The Latest Finds</h2>
                    <p class="luxury-muted mb-0">
                        Good design. Useful details. Everyday favourites.
                    </p>
                </div>

                <a href="{{ route('products.index') }}" class="luxury-text-link">
                    Shop All Products
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            @php
            $fallbackProductImages = [
            'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=800&q=80',
            ];
            @endphp

            <div class="row g-3 g-md-4">
                @foreach($products->take(8) as $product)
                @php
                $fallbackImage = $fallbackProductImages[$loop->index % count($fallbackProductImages)];
                @endphp

                <div class="col-6 col-lg-3">
                    <article class="luxury-product">

                        <a href="{{ route('products.show', $product->slug) }}"
                            class="luxury-product-image"
                            aria-label="View {{ $product->name }}">

                            <img
                                src="{{ $product->image ? asset('storage/' . $product->image) : $fallbackImage }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='{{ $fallbackImage }}';">

                            @if($product->stock > 0)
                            <span class="luxury-product-label">Available</span>
                            @else
                            <span class="luxury-product-label">Sold Out</span>
                            @endif
                        </a>

                        <div class="luxury-product-info">
                            <p class="luxury-product-category">
                                {{ $product->category->name ?? 'Collection' }}
                            </p>

                            <h3 class="luxury-product-name">
                                {{ $product->name }}
                            </h3>

                            <div class="d-flex align-items-center justify-content-between gap-2">
                                <span class="luxury-product-price">
                                    ৳{{ number_format($product->price, 2) }}
                                </span>

                                <span class="luxury-stock">
                                    @if($product->stock > 0)
                                    <i class="bi bi-check2"></i> In stock
                                    @else
                                    Out of stock
                                    @endif
                                </span>
                            </div>

                            <a href="{{ route('products.show', $product->slug) }}"
                                class="luxury-product-action">
                                Discover Product
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>

                    </article>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    @else
    <section class="luxury-section">
        <div class="luxury-container">
            <div class="luxury-empty">
                <i class="bi bi-bag fs-3 d-block mb-3"></i>
                <p class="mb-3">Our collection is being prepared.</p>
                <a href="{{ route('products.index') }}" class="luxury-text-link">
                    Browse the Shop <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    @endif
    @endisset

    {{-- EDITORIAL PROMOTION: Replace this URL with your own campaign image later. --}}
    <section class="luxury-container">
        <div class="luxury-editorial">
            <div class="luxury-editorial-content">
                <p class="luxury-eyebrow mb-2">The Everyday Edit</p>
                <h2>Make room for<br>better things.</h2>
                <p class="luxury-muted mb-4">
                    Explore useful essentials, considered details, and
                    new favourites for your everyday life.
                </p>
                <a href="{{ route('products.index') }}" class="luxury-button luxury-button-light">
                    Discover Lunexa
                    <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- FINAL CTA --}}
    <section class="luxury-container">
        <div class="luxury-cta">
            <div>
                <p class="luxury-eyebrow mb-2">A Better Way to Shop</p>
                <h2>Find your next favourite.</h2>
                <p class="luxury-muted mb-0">
                    Discover something worth bringing into your everyday.
                </p>
            </div>

            <a href="{{ route('products.index') }}" class="luxury-button flex-shrink-0">
                Shop Lunexa
                <i class="bi bi-arrow-up-right"></i>
            </a>
        </div>
    </section>

    <div class="pb-5"></div>

</div>

@endsection