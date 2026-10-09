
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;

// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Public Products
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product:slug}', [ProductController::class, 'show'])
    ->name('products.show');

// Public Categories
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

// Cart and Checkout
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::put('/cart/update/{cartItem}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');
});

// Admin Dashboard, Categories, Products, Orders and Users
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Category Management
        Route::get('/categories', [AdminCategoryController::class, 'index'])
            ->name('categories.index');

        Route::get('/categories/create', [AdminCategoryController::class, 'create'])
            ->name('categories.create');

        Route::post('/categories', [AdminCategoryController::class, 'store'])
            ->name('categories.store');

        Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])
            ->name('categories.edit');

        Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])
            ->name('categories.update');

        // Product Management
        Route::get('/products', [AdminProductController::class, 'index'])
            ->name('products.index');

        Route::get('/products/create', [AdminProductController::class, 'create'])
            ->name('products.create');

        Route::post('/products', [AdminProductController::class, 'store'])
            ->name('products.store');

        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])
            ->name('products.edit');

        Route::put('/products/{product}', [AdminProductController::class, 'update'])
            ->name('products.update');

        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])
            ->name('products.destroy');

        // Order Management
        Route::get('/orders', [OrderController::class, 'index'])
            ->name('orders.index');

        Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

        // User Management
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');
    });
