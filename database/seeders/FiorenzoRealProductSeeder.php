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

        $menCategory = Category::where('slug', 'men')->first();
        $womenCategory = Category::where('slug', 'women')->first();

        // --- SEED MEN ---
        $menPath = public_path('images/MEN');
        if (File::exists($menPath)) {
            $files = File::files($menPath);
            foreach ($files as $file) {
                $filename = $file->getFilename();
                if (!in_array($file->getExtension(), ['png', 'jpg', 'jpeg', 'webp']))
                    continue;

                $this->createProduct($filename, 'men', $menCategory->id, $fiorenzo->id, 'images/MEN/');
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

                $this->createProduct($filename, 'women', $womenCategory->id, $fiorenzo->id, 'images/WOMEN/');
            }
        }
    }

    private function createProduct($filename, $gender, $categoryId, $brandId, $folder)
    {
        // Guess category (string) from filename
        $lowerName = strtolower($filename);
        $type = 'accessories';
        $price = 85000;

        if (str_contains($lowerName, 'readytowear')) {
            $type = 'readytowear';
            $price = rand(220000, 480000);
        } elseif (str_contains($lowerName, 'shoes')) {
            $type = 'shoes';
            $price = rand(110000, 290000);
        } elseif (str_contains($lowerName, 'bag')) {
            $type = 'bag';
            $price = rand(380000, 950000);
        } elseif (str_contains($lowerName, 'handbag')) {
            $type = 'handbag';
            $price = rand(420000, 1100000);
        } else {
            $price = rand(45000, 160000);
        }

        // Generate a clean name
        // e.g. "ReadyToWearMen1.png" -> "Fiorenzo Ready-To-Wear 1"
        $cleanName = str_replace([$gender, '.png', '.jpg', '.jpeg', '.webp'], '', $filename);
        $cleanName = preg_replace('/(?<!^)([A-Z])/', ' $1', $cleanName); // Space before capitals
        $cleanName = trim($cleanName);
        $cleanName = "Fiorenzo " . $cleanName;

        Product::updateOrCreate(
            ['slug' => Str::slug($cleanName . '-' . $gender)],
            [
                'name' => $cleanName,
                'category_id' => $categoryId,
                'brand_id' => $brandId,
                'price' => $price,
                'stock' => rand(5, 15),
                'description' => "Exquisite luxury piece from the Fiorenzo $gender collection. Crafted with the finest materials and attention to detail.",
                'image_url' => $folder . $filename,
                'gender' => $gender,
                'category' => $type
            ]
        );
    }
}
