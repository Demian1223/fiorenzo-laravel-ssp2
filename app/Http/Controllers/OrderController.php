<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // List orders (web)
    public function index()
    {
        // For logged in users
        if (Auth::check()) {
            $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        } else {
            // For guests, maybe check session or just empty?
            // Requirement says "Create orders... listing orders". Usually implies auth.
            // Plan assumes auth for my-orders.
            $orders = collect(); // Empty for guest
        }

        return view('orders.index', compact('orders'));
    }

    // Show order details (web)
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        // Security check: ensure user owns order or is admin?
        if ($order->user_id && $order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }
}
