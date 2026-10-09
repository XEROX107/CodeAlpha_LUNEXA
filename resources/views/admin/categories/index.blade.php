@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold">Categories</h1>
            <p class="text-muted mb-0">
                Manage your Lunexa product categories.
            </p>
        </div>

        <a href="{{ route('admin.categories.create') }}"
            class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Add Category
        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>
                            <th class="px-4">#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th class="text-end px-4">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $category)

                        <tr>

                            <td class="px-4">
                                {{ $category->id }}
                            </td>

                            <td>
                                <strong>{{ $category->name }}</strong>
                            </td>

                            <td>
                                {{ $category->slug }}
                            </td>

                            <td>
                                {{ $category->products()->count() }}
                            </td>

                            <td>

                                @if($category->status)

                                <span class="badge bg-success">
                                    Active
                                </span>

                                @else

                                <span class="badge bg-secondary">
                                    Inactive
                                </span>

                                @endif

                            </td>

                            <td class="text-end px-4">

                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="btn btn-sm btn-outline-warning">

                                    <i class="bi bi-pencil"></i>
                                    Edit

                                </a>

                                <a href="{{ route('categories.show', $category->slug) }}"
                                    class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-eye"></i>
                                    View

                                </a>
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center py-5">
                                No categories found.
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection