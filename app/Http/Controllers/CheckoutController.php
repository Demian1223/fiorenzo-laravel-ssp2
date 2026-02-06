<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function create()
    {
        $cartItems = \App\Models\CartItem::where('user_id', auth()->id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Calculate totals
        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        $delivery = 2500;
        $total = $subtotal + $delivery;

        // Create PaymentIntent
        $stripeSecret = config('services.stripe.secret');
        if (!$stripeSecret) {
            return redirect()->route('cart.index')->with('error', 'Stripe payment is not configured. Please contact support.');
        }

        \Stripe\Stripe::setApiKey($stripeSecret);

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $total * 100, // Amount in cents
                'currency' => 'lkr',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                'metadata' => [
                    'user_id' => auth()->id(),
                ],
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return redirect()->route('cart.index')->with('error', 'Payment failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'An error occurred connecting to Stripe.');
        }

        // Map for view compatibility
        $cart = $cartItems->mapWithKeys(function ($item) {
            return [
                $item->product_id => [
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'image_url' => !empty($item->product->image_url) ? (Str::startsWith($item->product->image_url, ['http', 'https']) ? $item->product->image_url : asset($item->product->image_url)) : 'https://placehold.co/100',
                ]
            ];
        })->toArray();

        return view('checkout.payment', [
            'clientSecret' => $paymentIntent->client_secret,
            'cart' => $cart,
            'subtotal' => $subtotal,
            'delivery' => $delivery,
            'total' => $total
        ]);
    }

    public function store(Request $request)
    {
        // Deprecated or redirect to create if hit accidentally
        return redirect()->route('checkout.create');
    }

    public function success(Request $request)
    {
        $paymentIntentId = $request->query('payment_intent');

        if (!$paymentIntentId) {
            return redirect()->route('cart.index');
        }

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntentId);

        if ($paymentIntent->status !== 'succeeded' && $paymentIntent->status !== 'processing') {
            return redirect()->route('cart.index')->with('error', 'Payment failed or was cancelled. Status: ' . $paymentIntent->status);
        }

        // Check if order already exists for this payment intent
        $existingOrder = Order::where('payment_intent_id', $paymentIntentId)->first();
        if ($existingOrder) {
            return view('checkout.success', ['order' => $existingOrder]);
        }

        // Create Order
        try {
            DB::beginTransaction();

            $cartItems = \App\Models\CartItem::where('user_id', auth()->id())->with('product')->get();

            if ($cartItems->isEmpty()) {
                return redirect()->route('orders.index')->with('error', 'Session expired or cart empty. Please contact support with Payment ID: ' . $paymentIntentId);
            }

            // Recalculate total for record
            $subtotal = $cartItems->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });
            $delivery = 2500;
            $totalAmount = $subtotal + $delivery;


            $order = Order::create([
                'user_id' => auth()->id(),
                'status' => 'paid',
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
                    'subtotal' => $item->product->price * $item->quantity,
                ]);
            }

            // Clear Cart
            \App\Models\CartItem::where('user_id', auth()->id())->delete();

            DB::commit();

            return view('checkout.success', ['order' => $order]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Error creating order: ' . $e->getMessage());
        }
    }
}
