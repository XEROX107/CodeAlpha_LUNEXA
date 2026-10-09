@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}"
            class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left"></i> Back to Products
        </a>
        <h2 class="fw-bold mt-3">Edit Product</h2>
        <p class="text-muted">Update {{ $product->name }}.</p>
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
            <form action="{{ route('admin.products.update', $product) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Product Name *</label>
                        <input type="text" name="name"
                            value="{{ old('name', $product->name) }}"
                            class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Category *</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id', $product->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" rows="4"
                            class="form-control">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Price (৳) *</label>
                        <input type="number" name="price"
                            value="{{ old('price', $product->price) }}"
                            min="0" step="0.01"
                            class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Stock Quantity *</label>
                        <input type="number" name="stock"
                            value="{{ old('stock', $product->stock) }}"
                            min="0" step="1"
                            class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Replace Product Image</label>
                        <input type="file" name="image"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="form-control">
                        <small class="text-muted">Leave empty to keep the current image.</small>

                        @if($product->image)
                        <div class="mt-3">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="rounded border"
                                style="width:120px;height:120px;object-fit:cover;">
                        </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="1"
                                @selected((string) old('status', $product->status) === '1')>
                                Active
                            </option>
                            <option value="0"
                                @selected((string) old('status', $product->status) === '0')>
                                Inactive
                            </option>
                        </select>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        Update Product
                    </button>
                    <a href="{{ route('admin.products.index') }}"
                        class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection