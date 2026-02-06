<x-app-layout>
    <div class="min-h-screen bg-white text-[#1b1b1b] font-serif py-12">
        <!-- Hero Section -->
        <section class="relative w-full overflow-hidden bg-gray-900 mb-12">
            <img src="{{ asset('images/OTHER/Order.jpg') }}" alt="Orders Hero" class="w-full h-auto block">

            <!-- Dark Overlay (Explicit with inline style for safety) -->
            <div class="absolute inset-0 bg-black/75" style="background-color: rgba(0,0,0,0.75);"></div>

            <!-- Navbar Gradient Protection -->
            <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/90 to-transparent"></div>

            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-6xl text-white tracking-[0.15em] font-light uppercase z-10"
                    style="font-family: 'Cormorant Garamond', serif;">
                    Order Details
                </h1>
            </div>
        </section>

        <div class="max-w-4xl mx-auto px-6 lg:px-8">

            <div class="mb-8">
                <a href="{{ route('orders.index') }}"
                    class="text-xs uppercase tracking-widest text-gray-500 hover:text-black transition-colors flex items-center gap-2">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <path d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                    Back to Orders
                </a>
            </div>

            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 border-b border-gray-200 pb-8">
                <div>
                    <h1 class="text-3xl md:text-5xl font-light uppercase tracking-widest mb-2"
                        style="font-family: 'Cormorant Garamond', serif;">Order #{{ $order->id }}</h1>
                    <p class="text-gray-500 text-sm date-string">{{ $order->created_at->format('F d, Y \a\t h:i A') }}
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider
                        {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <!-- Items List -->
                <div class="lg:col-span-2 space-y-8">
                    <h3 class="text-sm font-bold uppercase tracking-widest border-b border-gray-200 pb-4 mb-6">Items
                    </h3>

                    @foreach($order->items as $item)
                        <div class="flex gap-6 items-start">
                            <div class="w-20 h-24 bg-gray-100 flex-shrink-0 overflow-hidden">
                                <!-- Fix: Use correct image_url property and ensure it's not null/empty -->
                                <img src="{{ !empty($item->product->image_url) ? (Str::startsWith($item->product->image_url, ['http', 'https']) ? $item->product->image_url : asset($item->product->image_url)) : 'https://placehold.co/100' }}"
                                    alt="{{ $item->product->name ?? 'Product' }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h4 class="text-xl font-serif text-black mb-1"
                                    style="font-family: 'Cormorant Garamond', serif;">
                                    {{ $item->product ? $item->product->name : 'Product #' . $item->product_id }}
                                </h4>
                                <p class="text-sm text-gray-500 mb-2">Quantity: {{ $item->quantity }}</p>
                                <!-- Using unit_price -->
                                <p class="text-lg text-black">LKR
                                    {{ number_format($item->unit_price ?? $item->product->price ?? 0) }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-medium">LKR
                                    {{ number_format(($item->unit_price ?? $item->product->price ?? 0) * $item->quantity) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 p-6 rounded-sm sticky top-12">
                        <h3 class="text-sm font-bold uppercase tracking-widest border-b border-gray-200 pb-4 mb-6">
                            Summary</h3>

                        @php
                            $subtotal = $order->items->sum(fn($i) => ($i->unit_price ?? $i->product->price ?? 0) * $i->quantity);
                            // If total_amount exists and is greater than subtotal, assume difference is delivery.
                            $delivery = ($order->total_amount > 0) ? ($order->total_amount - $subtotal) : 2500;
                        @endphp

                        <div class="space-y-4 text-sm text-gray-600 mb-6">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>LKR {{ number_format($subtotal) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Delivery</span>
                                <span>LKR {{ number_format($delivery) }}</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center border-t border-gray-200 pt-6">
                            <span class="text-lg font-serif text-black"
                                style="font-family: 'Cormorant Garamond', serif;">Total</span>
                            <span class="text-2xl font-serif text-black"
                                style="font-family: 'Cormorant Garamond', serif;">LKR
                                {{ number_format($order->total_amount) }}</span>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                            <p class="text-xs uppercase tracking-[0.2em] text-gray-500 mb-2">Delivery Status</p>
                            <p class="text-sm font-medium">Delivery within 2 weeks to your doorstep.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>