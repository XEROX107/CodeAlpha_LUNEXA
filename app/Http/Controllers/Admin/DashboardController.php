<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $categories = Category::count();
        $orders = Order::count();
        $users = User::count();

        return view('admin.dashboard', compact(
            'products',
            'categories',
            'orders',
            'users'
        ));
    }
}
