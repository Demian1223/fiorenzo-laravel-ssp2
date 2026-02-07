<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class FiorenzoRealProductSeeder extends Seeder
{
    public function run(): void
    {
        $fiorenzo = Brand::where('name', 'FIORENZO')->first();
        if (!$fiorenzo) {
            $fiorenzo = Brand::create(['name' => 'FIORENZO', 'slug' => 'fiorenzo']);
        }

        // Fetch precise categories
        $cats = [
            'readytowear' => Category::where('slug', 'ready-to-wear')->first()->id,
            'bag' => Category::where('slug', 'bags')->first()->id,
            'shoes' => Category::where('slug', 'shoes')->first()->id,
            'accessories' => Category::where('slug', 'accessories')->first()->id,
        ];

        // --- SEED MEN ---
        $menPath = public_path('images/MEN');
        if (File::exists($menPath)) {
            $files = File::files($menPath);
            foreach ($files as $file) {
                $filename = $file->getFilename();
                if (!in_array($file->getExtension(), ['png', 'jpg', 'jpeg', 'webp']))
                    continue;

                $this->createProduct($filename, 'men', $fiorenzo->id, 'images/MEN/', $cats);
            }
        }

        // --- SEED WOMEN ---
        $womenPath = public_path('images/WOMEN');
        if (File::exists($womenPath)) {
            $files = File::files($womenPath);
            foreach ($files as $file) {
                $filename = $file->getFilename();
                if (!in_array($file->getExtension(), ['png', 'jpg', 'jpeg', 'webp']))
                    continue;

                $this->createProduct($filename, 'women', $fiorenzo->id, 'images/WOMEN/', $cats);
            }
        }
    }

    private function createProduct($filename, $gender, $brandId, $folder, $cats)
    {
        $lowerName = strtolower($filename);
        $type = 'accessories';

        $price = 85000;
        $adjective = ['Elegant', 'Exclusive', 'Signature', 'Premium', 'Modern', 'Classic', 'Luxury'][rand(0, 6)];

        if (str_contains($lowerName, 'readytowear') || str_contains($lowerName, 'readwaytowear')) {
            $type = 'readytowear';
            $price = rand(185, 350) * 1000;
            $name = $adjective . ' Ready-To-Wear';
        } elseif (str_contains($lowerName, 'shoes')) {
            $type = 'shoes';
            $price = rand(125, 240) * 1000;
            $name = $adjective . ' Leather Loafers';
        } elseif (str_contains($lowerName, 'bag') || str_contains($lowerName, 'handbag')) {
            $type = 'bag';
            $price = rand(450, 950) * 1000;
            $name = $adjective . ' Evening Bag';
        } else {
            $type = 'accessories';
            $price = rand(45, 120) * 1000;
            $name = $adjective . ' Accessory';
        }

        $id = preg_replace('/[^0-9]/', '', $filename);
        if ($id) {
            $name .= ' Piece ' . $id;
        }

        // Stable slug using gender and filename
        $slug = Str::slug($gender . '-' . str_replace(['.png', '.jpg', '.jpeg', '.webp'], '', $filename));

        Product::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => $name,
                'category_id' => $cats[$type] ?? $cats['accessories'],
                'brand_id' => $brandId,
                'price' => $price,
                'stock' => rand(2, 8),
                'description' => "An exceptional $name from our $gender collection. FIORENZO brings you the pinnacle of fashion, blending traditional craftsmanship with contemporary design.",
                'image_url' => $folder . $filename,
                'gender' => $gender,
                'category' => $type
            ]
        );
    }
}
