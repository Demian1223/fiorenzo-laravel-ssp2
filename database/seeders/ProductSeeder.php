<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch Categories
        $men = Category::where('slug', 'men')->first();
        $women = Category::where('slug', 'women')->first();

        // Fetch Brands
        $gucci = Brand::where('slug', 'gucci')->first();
        $dior = Brand::where('slug', 'dior')->first();
        $chanel = Brand::where('slug', 'chanel')->first();
        $lv = Brand::where('slug', 'louis-vuitton')->first();

        // Sample Products
        $products = [
            [
                'name' => 'Gucci Horsebit Loafer',
                'category_id' => $men->id,
                'brand_id' => $gucci->id,
                'price' => 285000.00,
                'stock' => 10,
                'description' => 'Classic leather loafer with the signature Horsebit detail.',
                'image_url' => 'https://placehold.co/400x400?text=Gucci+Loafer',
            ],
            [
                'name' => 'Dior Saddle Bag',
                'category_id' => $women->id,
                'brand_id' => $dior->id,
                'price' => 1250000.00,
                'stock' => 5,
                'description' => 'Iconic saddle shape bag in blue Dior Oblique jacquard.',
                'image_url' => 'https://placehold.co/400x400?text=Dior+Saddle',
            ],
            [
                'name' => 'Chanel Classic Handbag',
                'category_id' => $women->id,
                'brand_id' => $chanel->id,
                'price' => 3100000.00,
                'stock' => 3,
                'description' => 'Timeless classic handbag in quilted lambskin with gold-tone metal.',
                'image_url' => 'https://placehold.co/400x400?text=Chanel+Bag',
            ],
            [
                'name' => 'Louis Vuitton Keepall 55',
                'category_id' => $men->id,
                'brand_id' => $lv->id,
                'price' => 850000.00,
                'stock' => 8,
                'description' => 'An icon since the appearing in 1930, the Keepall embodies the spirit of modern travel.',
                'image_url' => 'https://placehold.co/400x400?text=LV+Keepall',
            ],
            [
                'name' => 'Gucci GG Marmont Belt',
                'category_id' => $women->id,
                'brand_id' => $gucci->id,
                'price' => 150000.00,
                'stock' => 20,
                'description' => 'Black leather belt with the Double G buckle.',
                'image_url' => 'https://placehold.co/400x400?text=Gucci+Belt',
            ],
            [
                'name' => 'Dior Sauvage Eau de Toilette',
                'category_id' => $men->id,
                'brand_id' => $dior->id,
                'price' => 45000.00,
                'stock' => 50,
                'description' => 'A radically fresh composition, dictated by a name that has the ring of a manifesto.',
                'image_url' => 'https://placehold.co/400x400?text=Dior+Sauvage',
            ],
            [
                'name' => 'Chanel No 5 Parfum',
                'category_id' => $women->id,
                'brand_id' => $chanel->id,
                'price' => 65000.00,
                'stock' => 30,
                'description' => 'The now and forever fragrance. The ultimate womanliness.',
                'image_url' => 'https://placehold.co/400x400?text=Chanel+No5',
            ],
            [
                'name' => 'Louis Vuitton Christopher Backpack',
                'category_id' => $men->id,
                'brand_id' => $lv->id,
                'price' => 980000.00,
                'stock' => 4,
                'description' => 'A visually powerful everyday bag with the vigor of the outdoors.',
                'image_url' => 'https://placehold.co/400x400?text=LV+Backpack',
            ],
        ];

        foreach ($products as $data) {
            Product::updateOrCreate(
                ['slug' => Str::slug($data['name'])], // Check by slug
                [
                    'name' => $data['name'],
                    'category_id' => $data['category_id'],
                    'brand_id' => $data['brand_id'],
                    'price' => $data['price'],
                    'stock' => $data['stock'],
                    'description' => $data['description'],
                    'image_url' => $data['image_url'],
                ]
            );
        }
    }
}
