<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $electronics = Category::where('slug', 'electronics')->first();
        $fashion = Category::where('slug', 'fashion')->first();
        $home = Category::where('slug', 'home-living')->first();
        $accessories = Category::where('slug', 'accessories')->first();

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'Lunexa Wireless Headphones',
            'slug' => 'lunexa-wireless-headphones',
            'description' => 'Premium wireless headphones with clear sound and comfortable design.',
            'price' => 3500,
            'stock' => 25,
            'status' => true,
        ]);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'Smart Watch Pro',
            'slug' => 'smart-watch-pro',
            'description' => 'Modern smartwatch with fitness tracking and smart notifications.',
            'price' => 4200,
            'stock' => 18,
            'status' => true,
        ]);

        Product::create([
            'category_id' => $fashion->id,
            'name' => 'Classic Casual Shirt',
            'slug' => 'classic-casual-shirt',
            'description' => 'Comfortable casual shirt suitable for everyday use.',
            'price' => 1500,
            'stock' => 40,
            'status' => true,
        ]);

        Product::create([
            'category_id' => $fashion->id,
            'name' => 'Premium Hoodie',
            'slug' => 'premium-hoodie',
            'description' => 'Soft and stylish hoodie designed for everyday comfort.',
            'price' => 2200,
            'stock' => 30,
            'status' => true,
        ]);

        Product::create([
            'category_id' => $home->id,
            'name' => 'Minimal Desk Lamp',
            'slug' => 'minimal-desk-lamp',
            'description' => 'Modern desk lamp with a clean minimalist design.',
            'price' => 1800,
            'stock' => 20,
            'status' => true,
        ]);

        Product::create([
            'category_id' => $home->id,
            'name' => 'Smart LED Light',
            'slug' => 'smart-led-light',
            'description' => 'Smart LED lighting solution for your room.',
            'price' => 1200,
            'stock' => 35,
            'status' => true,
        ]);

        Product::create([
            'category_id' => $accessories->id,
            'name' => 'Urban Backpack',
            'slug' => 'urban-backpack',
            'description' => 'Durable backpack suitable for university and daily travel.',
            'price' => 2500,
            'stock' => 22,
            'status' => true,
        ]);

        Product::create([
            'category_id' => $accessories->id,
            'name' => 'Premium Wallet',
            'slug' => 'premium-wallet',
            'description' => 'Compact and elegant wallet made for everyday use.',
            'price' => 1000,
            'stock' => 45,
            'status' => true,
        ]);
    }
}
