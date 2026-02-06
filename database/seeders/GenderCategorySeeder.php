<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class GenderCategorySeeder extends Seeder
{
    public function run(): void
    {
        // Define categories we want to assign
        $womenCategories = ['Shorts', 'Skirts', 'Shoes', 'Handbags'];
        $menCategories = ['Shorts', 'T-Shirts', 'Shoes', 'Accessories'];

        // Get all products
        $products = Product::all();

        foreach ($products as $index => $product) {
            // Assign gender based on simple logic or random for now, roughly 50/50
            $gender = ($index % 2 == 0) ? 'women' : 'men';

            // Assign category based on gender
            if ($gender === 'women') {
                $category = $womenCategories[array_rand($womenCategories)];
            } else {
                $category = $menCategories[array_rand($menCategories)];
            }

            // Update product
            $product->update([
                'gender' => $gender,
                'category' => strtolower($category),
            ]);
        }
    }
}
