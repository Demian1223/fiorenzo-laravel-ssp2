<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        if ($request->has('category')) {
            $slug = $request->get('category');
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $products = $query->latest()->paginate(12);
        $categories = Category::all();

        return view('shop.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'brand']);
        $relatedProducts = Product::where('gender', $product->gender)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('shop.productdetail', compact('product', 'relatedProducts'));
    }
    public function women(Request $request)
    {
        $query = Product::where('gender', 'women');

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->paginate(16)->withQueryString();

        $categories = collect([
            (object) ['name' => 'Ready-To-Wear', 'slug' => 'ready-to-wear'],
            (object) ['name' => 'Shoes', 'slug' => 'shoes'],
            (object) ['name' => 'Handbags', 'slug' => 'handbags'],
            (object) ['name' => 'Accessories', 'slug' => 'accessories'],
        ]);

        return view('shop.women', compact('products', 'categories'));
    }

    public function men(Request $request)
    {
        $query = Product::where('gender', 'men');

        if ($request->has('category')) {
            $category = $request->category;
            $dbCategory = match ($category) {
                'ready-to-wear' => 'readytowear',
                'bags' => 'bag',
                default => $category,
            };
            $query->where('category', $dbCategory);
        }

        $products = $query->latest()->paginate(16)->withQueryString();

        $categories = collect([
            (object) ['name' => 'Ready-To-Wear', 'slug' => 'ready-to-wear'],
            (object) ['name' => 'Shoes', 'slug' => 'shoes'],
            (object) ['name' => 'Bags', 'slug' => 'bags'],
            (object) ['name' => 'Accessories', 'slug' => 'accessories'],
        ]);

        return view('shop.men', compact('products', 'categories'));
    }
}
