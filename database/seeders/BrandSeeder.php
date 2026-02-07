<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = ['FIORENZO', 'Gucci', 'Dior', 'Chanel', 'Louis Vuitton'];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['name' => $brand],
                ['slug' => Str::slug($brand)]
            );
        }
    }
}
