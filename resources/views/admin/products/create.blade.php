@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}"
            class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left"></i> Back to Products
        </a>
        <h2 class="fw-bold mt-3">Add New Product</h2>
        <p class="text-muted">Add a product to the Lunexa store.</p>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        <strong>Please correct the following errors:</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.products.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Product Name *</label>
                        <input type="text" name="name"
                            value="{{ old('name') }}"
                            class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Category *</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id')==$category->id)>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" rows="4"
                            class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Price (৳) *</label>
                        <input type="number" name="price"
                            value="{{ old('price') }}"
                            min="0" step="0.01"
                            class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Stock Quantity *</label>
                        <input type="number" name="stock"
                            value="{{ old('stock', 0) }}"
                            min="0" step="1"
                            class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Product Image</label>
                        <input type="file" name="image"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="form-control">
                        <small class="text-muted">JPG, PNG or WebP. Maximum 2 MB.</small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="1" @selected(old('status', '1' )=='1' )>Active</option>
                            <option value="0" @selected(old('status')==='0' )>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        Save Product
                    </button>
                    <a href="{{ route('admin.products.index') }}"
                        class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection