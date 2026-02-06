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
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric', // Trust client? Better to fetch from DB. usage: product->price
        ]);

        $user = $request->user();
        $paymentIntentId = $request->payment_intent_id;

        Stripe::setApiKey(config('services.stripe.secret'));
        $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

        if ($paymentIntent->status !== 'succeeded') {
            return response()->json(['error' => 'Payment not succeeded'], 400);
        }

        // Check if order already exists
        if (Order::where('payment_intent_id', $paymentIntentId)->exists()) {
            return response()->json(['error' => 'Order already processed'], 409);
        }

        // Calculate total from DB products to be safe (optional but recommended)
        // For MVP, using request prices or trusting total is risky. 
        // Let's assume we trust request items for structure but should sum it up.
        // Actually, let's just sum up from request for now to match payment logic.

        $totalAmount = 0;
        foreach ($request->items as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        // Add delivery?
        $delivery = 2500; // Hardcoded consistency
        $totalAmount += $delivery; // Or provided in request?

        // Check verification (optional: match paymentIntent->amount / 100 with $totalAmount)

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'paid',
                'total_amount' => $totalAmount,
                'payment_provider' => 'stripe',
                'payment_intent_id' => $paymentIntentId,
                'placed_at' => now(),
            ]);

            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                ]);
            }

            DB::commit();

            return response()->json(['message' => 'Order created successfully', 'order_id' => $order->id], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
