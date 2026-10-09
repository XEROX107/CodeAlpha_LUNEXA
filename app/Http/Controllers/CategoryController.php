<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', true)
            ->withCount('products')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $products = $category->products()
            ->where('status', true)
            ->latest()
            ->get();

        return view('categories.show', compact('category', 'products'));
    }
}
