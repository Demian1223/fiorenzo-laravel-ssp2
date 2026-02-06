<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereIn('slug', ['men', 'women'])->get();
        // Get 4 products for the 'Signature Styles' section
        $products = Product::with(['brand', 'category'])->latest()->take(4)->get();
        $brands = Brand::orderBy('name')->get();

        return view('home.index', compact('categories', 'products', 'brands'));
    }
}
