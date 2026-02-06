<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Livewire handles the view content
        return view('cart.index');
    }

    public function add(Request $request, Product $product)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $cartItem = \App\Models\CartItem::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            \App\Models\CartItem::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        // Livewire will pick this up on page load or polling, 
        // but if we are redirected back, we want the flash message.
        return redirect()->back()->with('success', 'Product added to bag.');
    }

    // Livewire handles update and remove now.
    // Keeping empty methods or removing them if routes are updated.
    // For safety, let's keep them as stubs or redirects if old JS calls them.
    public function remove(Request $request)
    {
        return redirect()->route('cart.index');
    }
    public function update(Request $request)
    {
        return redirect()->route('cart.index');
    }
}
