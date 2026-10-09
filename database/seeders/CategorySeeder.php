<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'description' => 'Smart electronics and modern gadgets.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'description' => 'Modern fashion and lifestyle products.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Home & Living',
            'slug' => 'home-living',
            'description' => 'Useful products for your home and lifestyle.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Accessories',
            'slug' => 'accessories',
            'description' => 'Everyday accessories and useful items.',
            'status' => true,
        ]);
    }
}
