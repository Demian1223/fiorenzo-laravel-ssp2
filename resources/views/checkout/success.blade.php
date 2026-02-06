<x-app-layout>
    <div class="min-h-screen bg-white text-[#1b1b1b] font-serif py-24">
        <div class="max-w-3xl mx-auto px-6 lg:px-8 text-center">

            <div class="mb-8 flex justify-center">
                <!-- Checkmark icon -->
                <div class="rounded-full bg-green-100 p-4">
                    <svg class="w-12 h-12 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <h1 class="text-4xl md:text-5xl font-light uppercase tracking-widest mb-6"
                style="font-family: 'Cormorant Garamond', serif;">Payment Successful</h1>

            <p class="text-lg text-gray-600 mb-12 uppercase tracking-wide">Thank you for your purchase.</p>

            <div class="bg-gray-50 border border-gray-100 p-8 rounded-sm mb-12 text-left">
                <div class="flex justify-between items-center mb-6 pb-6 border-b border-gray-200">
                    <span class="text-sm font-bold uppercase tracking-widest text-gray-500">Order Number</span>
                    <span class="text-xl font-serif text-black">#{{ $order->id }}</span>
                </div>

                <div class="space-y-4 mb-6">
                    @foreach($order->items as $item)
                        <div class="flex justify-between items-start text-sm">
                            <div class="flex items-center">
                                <span
                                    class="font-medium">{{ $item->product ? $item->product->name : 'Product #' . $item->product_id }}</span>
                                <span class="text-gray-500 ml-2">x {{ $item->quantity }}</span>
                            </div>
                            <!-- Using unit_price from order_item if available, fallback to product price (risk of change), or 0 -->
                            <span>LKR
                                {{ number_format(($item->unit_price ?? $item->product->price ?? 0) * $item->quantity) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-gray-200 pt-4 space-y-2 text-sm">
                    @php
                        // Recalculate based on saved unit_prices
                        $subtotal = $order->items->sum(fn($i) => ($i->unit_price ?? $i->product->price ?? 0) * $i->quantity);
                        // If total_amount exists, delivery difference. Else hardcoded delivery.
                        $delivery = $order->total_amount ? ($order->total_amount - $subtotal) : 2500;
                     @endphp

                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal</span>
                        <span>LKR {{ number_format($subtotal) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Delivery</span>
                        <span>LKR {{ number_format($delivery) }}</span>
                    </div>
                    <div class="flex justify-between text-xl font-serif font-normal pt-4 border-t border-gray-200 mt-4">
                        <span style="font-family: 'Cormorant Garamond', serif;">Total</span>
                        <span>LKR {{ number_format($order->total_amount) }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-black text-white p-6 mb-12">
                <p class="text-sm uppercase tracking-[0.2em]">Delivery within 2 weeks to your doorstep.</p>
            </div>

            <div class="flex justify-center gap-4">
                <a href="{{ route('orders.index') }}"
                    class="px-8 py-3 border border-black text-black hover:bg-black hover:text-white transition-colors duration-300 uppercase tracking-widest text-xs">
                    View My Orders
                </a>
                <a href="{{ route('shop.index') }}"
                    class="px-8 py-3 bg-black text-white hover:bg-gray-800 transition-colors duration-300 uppercase tracking-widest text-xs">
                    Continue Shopping
                </a>
            </div>

        </div>
    </div>
</x-app-layout>