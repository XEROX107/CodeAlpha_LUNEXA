@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <h1 class="fw-bold">Edit Category</h1>
        <p class="text-muted">
            Update the category information.
        </p>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form method="POST"
                action="{{ route('admin.categories.update', $category->id) }}">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label for="name" class="form-label fw-semibold">
                        Category Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name', $category->name) }}"
                        required>

                    @error('name')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label for="description" class="form-label fw-semibold">
                        Description
                    </label>

                    <textarea
                        name="description"
                        id="description"
                        class="form-control"
                        rows="4">{{ old('description', $category->description) }}</textarea>

                    @error('description')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label for="status" class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status" id="status" class="form-select">

                        <option value="1"
                            {{ old('status', $category->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $category->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                    @error('status')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <a href="{{ route('admin.categories.index') }}"
                    class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i>
                    Update Category
                </button>

            </form>

        </div>

    </div>

</div>

@endsection