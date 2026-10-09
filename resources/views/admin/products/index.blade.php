@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manage Products</h1>
        <a href="{{ route('admin.products.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded">
            Add Product
        </a>
    </div>

    @if (session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if ($products->count())
    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Image</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Category</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Stock</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="border-t">
                    <td class="p-3">
                        @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-14 h-14 object-cover rounded">
                        @else
                        <span class="text-gray-500">No image</span>
                        @endif
                    </td>
                    <td class="p-3">{{ $product->name }}</td>
                    <td class="p-3">{{ $product->category->name ?? 'N/A' }}</td>
                    <td class="p-3">৳{{ number_format($product->price, 2) }}</td>
                    <td class="p-3">{{ $product->stock }}</td>
                    <td class="p-3">
                        {{ $product->status ? 'Active' : 'Inactive' }}
                    </td>
                    <td class="p-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="text-blue-600">Edit</a>

                            <form action="{{ route('admin.products.destroy', $product) }}"
                                method="POST"
                                onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
    @else
    <p class="bg-white p-6 rounded shadow">
        No products found. Click "Add Product" to create your first product.
    </p>
    @endif
</div>
@endsection