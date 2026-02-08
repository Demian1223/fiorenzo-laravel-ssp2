<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'slug' => 'nullable|string|unique:products,slug',
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'image_url' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        }

        // Handle missing brand_id if nullable in DB, OR default to first brand if required
        // Based on migration, brand_id IS required. We must provide one.
        if (empty($validated['brand_id'])) {
            // Try to find FIORENZO or first brand
            $brand = Brand::where('name', 'FIORENZO')->first() ?? Brand::first();
            if ($brand) {
                $validated['brand_id'] = $brand->id;
            } else {
                // If no brands exist, this will still fail at DB level.
                // We should probably create a default brand or handle this.
                // For now, let's assume seeders ran or create one.
                $brand = Brand::create(['name' => 'FIORENZO', 'slug' => 'fiorenzo']);
                $validated['brand_id'] = $brand->id;
            }
        }

        // Populate the 'category' string column from the Category model
        $category = Category::find($validated['category_id']);
        if ($category) {
            $validated['category'] = $category->slug; // or name, using slug for consistency

            // Auto-assign Gender
            $catName = strtolower($category->name);
            if ($catName === 'men' || (str_contains($catName, 'men') && !str_contains($catName, 'women'))) {
                $validated['gender'] = 'men';
            } elseif ($catName === 'women' || str_contains($catName, 'women')) {
                $validated['gender'] = 'women';
            }
        }

        // Set default gender if needed (migration made it nullable, so safe)

        try {
            Product::create($validated);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()->withInput()->withErrors(['slug' => 'The generated slug for this product name already exists. Please user a different name.']);
            }
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the product: ' . $e->getMessage()]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'slug' => 'nullable|string|unique:products,slug,' . $product->id,
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'image_url' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        }

        // Handle brand_id if missing (keep existing or default)
        if (empty($validated['brand_id'])) {
            $validated['brand_id'] = $product->brand_id; // Keep existing
            // If somehow existing is null (shouldn't be due to DB constraint), default it
            if (!$validated['brand_id']) {
                $brand = Brand::where('name', 'FIORENZO')->first() ?? Brand::first();
                $validated['brand_id'] = $brand ? $brand->id : null;
            }
        }

        // Populate category string
        $category = Category::find($validated['category_id']);
        if ($category) {
            $validated['category'] = $category->slug;

            // Auto-assign Gender based on Category Name/Slug
            // This is a heuristic. Ideally we should have a Gender dropdown or Category should have a gender_id.
            $catName = strtolower($category->name);
            $catSlug = strtolower($category->slug);

            if (str_contains($catName, 'men') && !str_contains($catName, 'women')) {
                $validated['gender'] = 'men';
            } elseif (str_contains($catName, 'women') || str_contains($catName, 'ladies')) {
                $validated['gender'] = 'women';
            } else {
                // Default fallback or leave nullable if unknown
                // Maybe check if it's 'bags' -> usually women's in this shop context?
                // For now, let's default to 'women' if ambiguous as per shop focus, or maybe 'unisex'?
                // Actually, let's look at existing data.
                // If the user selected 'Men', the category name is 'Men'.
                if ($catName === 'men') {
                    $validated['gender'] = 'men';
                } elseif ($catName === 'women') {
                    $validated['gender'] = 'women';
                }
            }
        }

        try {
            $product->update($validated);
        } catch (\Illuminate\Database\QueryException $e) {
            // Check for duplicate entry error (1062)
            if ($e->errorInfo[1] == 1062) {
                return back()->withInput()->withErrors(['slug' => 'The generated slug for this product name already exists. Please user a different name.']);
            }
            return back()->withInput()->withErrors(['error' => 'An error occurred while updating the product: ' . $e->getMessage()]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
