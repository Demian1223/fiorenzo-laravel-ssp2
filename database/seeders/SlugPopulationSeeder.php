<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class SlugPopulationSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->slug = Str::slug($product->name) . '-' . $product->id;
            $product->save();
        }
    }
}
