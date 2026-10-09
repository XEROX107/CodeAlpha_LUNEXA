<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lunexa | Shop Smart. Live Better.')</title>
    <link rel="icon" type="image/png" href="{{ asset('lunexa_symbol_icon.png') }}?v=1">
    <meta name="description" content="@yield('meta_description', 'Discover quality electronics, fashion, accessories, and lifestyle products at Lunexa.')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --lunexa-dark: #111827;
            --lunexa-darker: #0b1120;
            --lunexa-blue: #0d6efd;
            --lunexa-cyan: #0dcaf0;
        }

        body {
            background: #f8f9fa;
            color: #212529;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            background: var(--lunexa-dark);
            padding: 14px 0;
        }

        .navbar-brand {
            color: #fff !important;
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: 3px;
        }

        .brand-dot {
            color: var(--lunexa-cyan);
        }

        .navbar .nav-link {
            color: #e5e7eb !important;
            margin-left: 10px;
            transition: color .2s;
        }

        .navbar .nav-link:hover {
            color: var(--lunexa-cyan) !important;
        }

        .navbar .nav-link.active {
            color: var(--lunexa-cyan) !important;
        }

        .navbar-toggler {
            border-color: #64748b;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 .15rem rgba(13, 202, 240, .3);
        }

        .btn-register {
            border-radius: 8px;
            font-weight: 600;
            padding: 9px 16px;
        }

        .dropdown-menu {
            border: none;
            border-radius: 12px;
            padding: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
        }

        .dropdown-item {
            padding: 10px 12px;
            border-radius: 7px;
        }

        .hero {
            background: linear-gradient(135deg, #111827, #1f2937);
            color: white;
            padding: 80px 20px;
            border-radius: 0 0 30px 30px;
        }

        .product-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            transition: transform .3s, box-shadow .3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
        }

        .product-image {
            height: 220px;
            width: 100%;
            object-fit: cover;
            background: #f1f3f5;
        }

        .price {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
        }

        main {
            min-height: 55vh;
        }

        .site-footer {
            background: var(--lunexa-darker);
            color: #d1d5db;
            margin-top: 70px;
        }

        .footer-brand {
            color: #fff;
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: 3px;
        }

        .footer-heading {
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 18px;
        }

        .footer-text {
            color: #9ca3af;
            line-height: 1.8;
        }

        .footer-link {
            display: block;
            color: #9ca3af;
            text-decoration: none;
            margin-bottom: 11px;
            transition: color .2s;
        }

        .footer-link:hover {
            color: var(--lunexa-cyan);
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 1px solid #374151;
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            margin-right: 8px;
            transition: all .2s;
        }

        .social-link:hover {
            background: var(--lunexa-cyan);
            border-color: var(--lunexa-cyan);
            color: #111827;
            transform: translateY(-3px);
        }

        .footer-divider {
            border-color: #374151;
            opacity: 1;
        }

        @media (max-width: 991px) {
            .navbar .nav-link {
                margin: 4px 0;
            }

            .navbar .btn-register {
                display: inline-block;
                margin: 8px 0;
            }
        }

        /* ==========================================
   LUNEXA — MINIMAL LUXURY NAVBAR & FOOTER
========================================== */

        :root {
            --lunexa-black: #171717;
            --lunexa-muted: #737373;
            --lunexa-border: #e8e8e8;
            --lunexa-soft: #f8f8f6;
        }

        /* Global */
        body {
            background: #ffffff;
            color: var(--lunexa-black);
        }

        /* ---------- NAVBAR ---------- */

        .navbar {
            background: rgba(255, 255, 255, 0.96) !important;
            border-bottom: 1px solid var(--lunexa-border);
            padding: 17px 0;
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            box-shadow: none !important;
        }

        .navbar .container {
            gap: 18px;
        }

        .navbar-brand {
            color: var(--lunexa-black) !important;
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 4px;
            margin-right: 28px;
            transition: opacity 0.2s ease;
        }

        .navbar-brand:hover {
            opacity: 0.65;
        }

        .brand-dot {
            color: #a3a3a3;
        }

        .navbar .navbar-nav {
            align-items: center;
            gap: 8px;
        }

        .navbar .nav-link {
            position: relative;
            color: #525252 !important;
            font-size: 0.83rem;
            font-weight: 500;
            padding: 10px 12px !important;
            transition: color 0.2s ease;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #000 !important;
        }

        .navbar .nav-link::after {
            content: "";
            position: absolute;
            left: 12px;
            right: 12px;
            bottom: 4px;
            height: 1px;
            background: #171717;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.25s ease;
        }

        .navbar .nav-link:hover::after,
        .navbar .nav-link.active::after {
            transform: scaleX(1);
        }

        /* Search */
        .navbar form input[type="search"] {
            width: 150px;
            border: 1px solid #e5e5e5;
            border-radius: 2px;
            background: #fff;
            color: #171717;
            font-size: 0.8rem;
            padding: 9px 11px;
            box-shadow: none !important;
            transition: border-color 0.2s ease, width 0.25s ease;
        }

        .navbar form input[type="search"]:focus {
            width: 180px;
            border-color: #737373;
        }

        .navbar form button {
            border: 1px solid var(--lunexa-black);
            border-radius: 2px;
            background: var(--lunexa-black);
            color: #fff;
            padding: 8px 12px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .navbar form button:hover {
            background: #fff;
            color: var(--lunexa-black);
        }

        /* Login, register and cart */
        .navbar .btn,
        .navbar .dropdown-toggle {
            font-size: 0.82rem;
        }

        .navbar .btn-register,
        .navbar a.btn-register {
            border: 1px solid var(--lunexa-black);
            border-radius: 2px;
            background: var(--lunexa-black);
            color: #fff;
            padding: 9px 17px;
            transition: all 0.2s ease;
        }

        .navbar .btn-register:hover,
        .navbar a.btn-register:hover {
            background: #fff;
            color: var(--lunexa-black);
        }

        .navbar .btn-outline-light {
            border-radius: 2px;
        }

        /* Dropdown */
        .navbar .dropdown-menu {
            min-width: 190px;
            margin-top: 12px;
            padding: 8px;
            border: 1px solid var(--lunexa-border);
            border-radius: 2px;
            background: #fff;
            box-shadow: 0 14px 35px rgba(0, 0, 0, 0.07);
        }

        .navbar .dropdown-item {
            border-radius: 1px;
            padding: 10px 12px;
            color: #404040;
            font-size: 0.84rem;
        }

        .navbar .dropdown-item:hover {
            background: var(--lunexa-soft);
            color: #000;
        }

        /* Mobile menu toggle */
        .navbar-toggler {
            padding: 7px 9px;
            border: 1px solid #dedede;
            border-radius: 2px;
            box-shadow: none !important;
        }

        .navbar-toggler-icon {
            filter: grayscale(1) brightness(0.3);
        }

        /* ---------- FOOTER ---------- */

        .site-footer {
            position: relative;
            margin-top: 70px;
            padding: 64px 0 22px;
            background: #f8f8f6 !important;
            color: #525252 !important;
            border-top: 1px solid var(--lunexa-border);
        }

        .site-footer .container {
            max-width: 1200px;
        }

        .site-footer .row {
            row-gap: 32px;
        }

        .footer-brand {
            display: inline-block;
            margin-bottom: 16px;
            color: var(--lunexa-black) !important;
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 4px;
            text-decoration: none;
        }

        .site-footer h5,
        .site-footer h6 {
            margin-bottom: 18px;
            color: var(--lunexa-black) !important;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .site-footer p {
            max-width: 350px;
            color: #737373 !important;
            font-size: 0.88rem;
            line-height: 1.9;
        }

        .footer-link,
        .site-footer a:not(.social-link):not(.footer-brand) {
            color: #666 !important;
            font-size: 0.86rem;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-link:hover,
        .site-footer a:not(.social-link):not(.footer-brand):hover {
            color: #000 !important;
        }

        /* Social links */
        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            margin-right: 7px;
            border: 1px solid #deded8;
            border-radius: 50%;
            background: transparent;
            color: #404040 !important;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .social-link:hover {
            transform: translateY(-3px);
            border-color: #171717;
            background: #171717;
            color: #fff !important;
        }

        .site-footer hr {
            margin: 38px 0 20px;
            border-color: #deded8;
            opacity: 1;
        }

        .site-footer .copyright,
        .site-footer small {
            color: #858585 !important;
            font-size: 0.77rem;
        }

        /* ---------- RESPONSIVE ---------- */

        @media (max-width: 991.98px) {
            .navbar {
                padding: 12px 0;
            }

            .navbar .navbar-nav {
                align-items: stretch;
                gap: 2px;
                margin-top: 12px;
            }

            .navbar .nav-link {
                padding: 10px 0 !important;
            }

            .navbar .nav-link::after {
                display: none;
            }

            .navbar form {
                display: flex;
                width: 100%;
                max-width: 360px;
                margin: 10px 0;
            }

            .navbar form input[type="search"],
            .navbar form input[type="search"]:focus {
                width: 100%;
                min-width: 0;
            }

            .navbar .dropdown-menu {
                margin-top: 4px;
                box-shadow: none;
            }

            .site-footer {
                margin-top: 45px;
                padding-top: 45px;
            }
        }

        @media (max-width: 575.98px) {
            .navbar-brand {
                font-size: 1.2rem;
                letter-spacing: 3px;
                margin-right: 0;
            }

            .site-footer {
                padding-top: 38px;
            }

            .site-footer .row {
                row-gap: 26px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                LUNEXA<span class="brand-dot">.</span>
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}"
                            href="{{ route('products.index') }}">
                            Shop
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}"
                            href="{{ route('categories.index') }}">
                            Categories
                        </a>
                    </li>



                    <li class="nav-item ms-lg-2">
                        <form action="{{ route('products.index') }}"
                            method="GET"
                            class="d-flex align-items-center my-2 my-lg-0"
                            role="search">

                            <input
                                type="search"
                                name="search"
                                class="form-control form-control-sm"
                                placeholder="Search..."
                                aria-label="Search products"
                                value="{{ request('search') }}"
                                style="width: 140px; height: 34px;">

                            <button type="submit"
                                class="btn btn-info btn-sm ms-2"
                                style="height: 34px;">
                                <i class="bi bi-search"></i>
                            </button>

                        </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="bi bi-cart3 me-1"></i> Cart
                        </a>
                    </li>

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            Login
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-primary btn-register"
                            href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i>
                            Register
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown ms-lg-2">
                        <a class="nav-link dropdown-toggle"
                            href="#"
                            id="accountDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ auth()->user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="accountDropdown">

                            @if(auth()->user()->is_admin)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Admin Dashboard </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @endif

                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('cart.index') }}">
                                    <i class="bi bi-cart me-2"></i>
                                    My Cart
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    <main>
        @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="container mt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer pt-5 pb-3">
        <div class="container">

            <div class="row g-4 pb-4">

                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('/') }}" class="footer-brand text-decoration-none">
                        LUNEXA<span class="brand-dot">.</span>
                    </a>

                    <p class="footer-text mt-3">
                        Shop Smart. Live Better. Discover electronics, fashion,
                        accessories, and everyday essentials — all in one place.
                    </p>

                    <div class="mt-4">
                        <a href="https://web.facebook.com/meshakibhd" target="_blank"
                            rel="noopener noreferrer" class="social-link"
                            aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a href="https://www.instagram.com/s_a_i_o_n_0_7/" target="_blank"
                            rel="noopener noreferrer" class="social-link"
                            aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="https://www.linkedin.com/in/sakib-ahmed-cs/" target="_blank"
                            rel="noopener noreferrer" class="social-link"
                            aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>

                        <a href="https://www.youtube.com/@shakibcave" target="_blank"
                            rel="noopener noreferrer" class="social-link"
                            aria-label="YouTube">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="footer-heading">Quick Links</h6>

                    <a href="{{ url('/') }}" class="footer-link">Home</a>
                    <a href="{{ route('products.index') }}" class="footer-link">Shop Products</a>
                    <a href="{{ route('categories.index') }}" class="footer-link">Categories</a>
                    <a href="{{ route('cart.index') }}" class="footer-link">Shopping Cart</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-heading">Customer Account</h6>

                    @guest
                    <a href="{{ route('login') }}" class="footer-link">Login</a>
                    <a href="{{ route('register') }}" class="footer-link">Create an Account</a>
                    @else
                    <a href="{{ route('cart.index') }}" class="footer-link">My Cart</a>
                    @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.products.index') }}" class="footer-link">Admin Dashboard</a> @endif
                    @endguest

                    <a href="mailto:support@lunexa.example" class="footer-link">
                        <i class="bi bi-envelope me-2"></i>Contact Support
                    </a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-heading">Store Information</h6>

                    <p class="footer-text mb-2">
                        <i class="bi bi-truck me-2"></i>
                        Convenient online shopping
                    </p>

                    <p class="footer-text mb-2">
                        <i class="bi bi-shield-check me-2"></i>
                        Secure account access
                    </p>

                    <p class="footer-text mb-2">
                        <i class="bi bi-bag-check me-2"></i>
                        Browse our latest products
                    </p>
                </div>

            </div>

            <hr class="footer-divider">

            <div class="d-flex flex-column flex-md-row
                        justify-content-between align-items-center gap-2 pt-2">

                <p class="footer-text small mb-0">
                    © {{ date('Y') }} Lunexa. All rights reserved.
                </p>

                <p class="footer-text small mb-0">
                    Made for smarter shopping <i class="bi bi-heart-fill text-danger"></i>
                </p>

            </div>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>

</html>