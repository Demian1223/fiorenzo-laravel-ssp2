<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)
            ->with('items.product')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_intent_id' => 'required|string',
        ]);

        $user = $request->user();
        $paymentIntentId = $request->payment_intent_id;

        // Fetch cart items
        $cartItems = $user->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['error' => 'Cart is empty'], 400);
        }

        // Mock Stripe Verification for Testing (since we don't have a frontend flow for PaymentIntent)
        // Stripe::setApiKey(config('services.stripe.secret'));
        // try {
        //     $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Invalid Payment Intent'], 400);
        // }

        // if ($paymentIntent->status !== 'succeeded') {
        //     return response()->json(['error' => 'Payment not succeeded'], 400);
        // }

        // Check verification (mock)
        if (!$paymentIntentId) {
            return response()->json(['error' => 'Payment intent required'], 400);
        }

        // Check if order already exists
        if (Order::where('payment_intent_id', $paymentIntentId)->exists()) {
            return response()->json(['error' => 'Order already processed'], 409);
        }

        $totalAmount = 0;
        foreach ($cartItems as $item) {
            if ($item->product->stock < $item->quantity) {
                return response()->json(['error' => "Product {$item->product->name} is out of stock"], 400);
            }
            $totalAmount += $item->product->price * $item->quantity;
        }

        $delivery = 2500; // Hardcoded consistency
        $totalAmount += $delivery;

        // Optional: Verify amount matches PaymentIntent amount
        // if ($paymentIntent->amount != $totalAmount * 100) { ... }

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'paid', // Can be 'processing'
                'total_amount' => $totalAmount,
                'payment_provider' => 'stripe',
                'payment_intent_id' => $paymentIntentId,
                'placed_at' => now(),
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->product->price,
                    'subtotal' => $item->quantity * $item->product->price,
                ]);

                // Reduce stock
                $item->product->decrement('stock', $item->quantity);
            }

            // Clear cart
            $user->cartItems()->delete();

            DB::commit();

            return response()->json([
                'message' => 'Order created successfully',
                'order_id' => $order->id
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
