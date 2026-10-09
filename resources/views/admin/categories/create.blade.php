@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <h1 class="fw-bold">Add Category</h1>
        <p class="text-muted">
            Create a new product category for Lunexa.
        </p>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form method="POST" action="{{ route('admin.categories.store') }}"> @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">
                        Category Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        placeholder="Enter category name"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">
                        Description
                    </label>

                    <textarea
                        name="description"
                        id="description"
                        class="form-control"
                        rows="4"
                        placeholder="Enter category description"></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <a href="{{ route('admin.categories.index') }}"
                    class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i>
                    Create Category
                </button>

            </form>

        </div>

    </div>

</div>

@endsection