<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'max:100'],
            'min_price' => ['nullable', 'numeric', 'min:0'],
            'max_price' => ['nullable', 'numeric', 'min:0'],
            'sort' => ['nullable', 'in:latest,price_asc,price_desc,name_asc'],
        ]);

        $search = trim($filters['search'] ?? '');

        $query = Product::query()
            ->where('status', true)
            ->with('category');

        // Search by product name or description.
        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by category slug.
        if (!empty($filters['category'])) {
            $query->whereHas('category', function ($builder) use ($filters) {
                $builder->where('slug', $filters['category']);
            });
        }

        // Filter by minimum and maximum price.
        if (isset($filters['min_price']) && $filters['min_price'] !== '') {
            $query->where('price', '>=', $filters['min_price']);
        }

        if (isset($filters['max_price']) && $filters['max_price'] !== '') {
            $query->where('price', '<=', $filters['max_price']);
        }

        // Sorting.
        switch ($filters['sort'] ?? 'latest') {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;

            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;

            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;

            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();

        $categories = Category::query()
            ->orderBy('name')
            ->get();

        return view('products.index', compact(
            'products',
            'categories',
            'search',
            'filters'
        ));
    }

    public function show(Product $product)
    {
        // Prevent unpublished products from being viewed publicly.
        abort_unless($product->status, 404);

        $product->load('category');

        return view('products.show', compact('product'));
    }
}
