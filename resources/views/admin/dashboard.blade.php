@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Dashboard Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold">Lunexa Admin Dashboard</h1>
            <p class="text-muted mb-0">
                Manage your Lunexa store from here.
            </p>
        </div>

        <span class="badge bg-primary fs-6 mt-3 mt-md-0">
            Administrator
        </span>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-5">

        <!-- Products -->
        <div class="col-6 col-md-3">
            <a href="{{ route('admin.products.index') }}"
                class="text-decoration-none text-dark d-block h-100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Products</h6>
                        <h2 class="fw-bold">{{ $products }}</h2>
                        <small class="text-primary">
                            Manage Products
                            <i class="bi bi-arrow-right"></i>
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Categories -->
        <div class="col-6 col-md-3">
            <a href="{{ route('admin.categories.index') }}"
                class="text-decoration-none text-dark d-block h-100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Categories</h6>
                        <h2 class="fw-bold">{{ $categories }}</h2>
                        <small class="text-primary">
                            Manage Categories
                            <i class="bi bi-arrow-right"></i>
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Orders -->
        <div class="col-6 col-md-3">
            <a href="{{ route('admin.orders.index') }}"
                class="text-decoration-none text-dark d-block h-100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Orders</h6>
                        <h2 class="fw-bold">{{ $orders }}</h2>
                        <small class="text-primary">
                            Manage Orders
                            <i class="bi bi-arrow-right"></i>
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Users -->
        <div class="col-6 col-md-3">
            <a href="{{ route('admin.users.index') }}"
                class="text-decoration-none text-dark d-block h-100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Users</h6>
                        <h2 class="fw-bold">{{ $users }}</h2>
                        <small class="text-primary">
                            Manage Users
                            <i class="bi bi-arrow-right"></i>
                        </small>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- Store Management Section -->
    <div class="mb-4">
        <h3 class="fw-bold">Store Management</h3>
        <p class="text-muted">
            Quickly access the main areas of your store.
        </p>
    </div>

    <div class="row g-4">

        <!-- Product Management -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-box-seam fs-2 text-primary me-3"></i>
                        <h5 class="fw-bold mb-0">Product Management</h5>
                    </div>

                    <p class="text-muted">
                        Add new products, update prices and stock,
                        upload product images, or remove products.
                    </p>

                    <a href="{{ route('admin.products.index') }}"
                        class="btn btn-primary">
                        Manage Products
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>

                    <a href="{{ route('admin.products.create') }}"
                        class="btn btn-outline-primary ms-2">
                        Add Product
                    </a>
                </div>
            </div>
        </div>

        <!-- Category Management -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-grid fs-2 text-success me-3"></i>
                        <h5 class="fw-bold mb-0">Category Management</h5>
                    </div>

                    <p class="text-muted">
                        Organize your products into categories
                        and keep your store structured.
                    </p>

                    <a href="{{ route('admin.categories.index') }}"
                        class="btn btn-success">
                        Manage Categories
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection