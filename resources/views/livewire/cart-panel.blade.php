<div class="font-serif w-full">
    <!-- Hero Section -->
    <div class="relative w-full h-[60vh] mb-12">
        <img src="{{ asset('images/OTHER/cart.jpg') }}" alt="Shopping Bag" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center text-white">
            <h1 class="text-5xl md:text-6xl font-light tracking-widest mb-4"
                style="font-family: 'Cormorant Garamond', serif;">Shopping Bag</h1>
            <p class="text-sm uppercase tracking-wider">{{ count($cartItems) }} Items</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-[1920px] mx-auto px-6 lg:px-12 pb-10">

        @if(count($cartItems) > 0)
            <div class="flex flex-col lg:flex-row gap-12 md:gap-24 relative">

                <!-- Cart Items List (Left) -->
                <div class="flex-1 space-y-8">
                    @foreach($cartItems as $item)
                        <div class="flex gap-6 pb-8 border-b border-gray-100 last:border-0 relative group"
                            wire:key="cart-item-{{ $item->id }}">

                            <!-- Image -->
                            <div class="w-24 sm:w-32 aspect-[3/4] bg-gray-50 flex-shrink-0 overflow-hidden">
                                <img src="{{ !empty($item->product->image_url) ? (Str::startsWith($item->product->image_url, ['http', 'https']) ? $item->product->image_url : asset($item->product->image_url)) : 'https://placehold.co/100' }}"
                                    alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                            </div>

                            <!-- Details -->
                            <div class="flex-1 flex flex-col">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-lg md:text-xl font-light tracking-wide font-serif leading-tight mb-1">
                                            <a href="{{ route('products.show', $item->product->slug) }}"
                                                class="hover:underline">
                                                {{ $item->product->name }}
                                            </a>
                                        </h3>
                                        <p class="text-base tracking-wide font-serif">LKR
                                            {{ number_format($item->product->price) }}
                                        </p>
                                    </div>
                                    <button wire:click="remove({{ $item->id }})"
                                        class="text-[10px] uppercase tracking-widest text-gray-400 hover:text-black hover:underline transition-colors"
                                        aria-label="Remove">
                                        Remove
                                    </button>
                                </div>

                                <!-- Qty Control -->
                                <div class="flex items-center gap-4">
                                    <span class="text-[10px] uppercase tracking-widest text-gray-400">Quantity</span>
                                    <div class="relative">
                                        <select wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                                            class="appearance-none bg-transparent border-b border-gray-200 focus:border-black rounded-none py-1 pr-8 text-sm font-serif focus:ring-0 cursor-pointer">
                                            @for($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}" @selected($item->quantity == $i)>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <div
                                            class="absolute right-0 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary (Right - Sticky) -->
                <div class="lg:w-1/3 relative">
                    <div class="sticky top-32 bg-gray-50/50 p-8 md:p-10 backdrop-blur-sm">
                        <h2 class="text-lg uppercase tracking-widest mb-8 border-b border-gray-200 pb-4">Order Summary</h2>

                        <div class="space-y-4 mb-8 text-sm tracking-wide">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span>LKR {{ number_format($subtotal) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Delivery</span>
                                <span>LKR {{ number_format($delivery) }}</span>
                            </div>
                        </div>

                        <div
                            class="flex justify-between items-center text-xl mb-8 border-t border-gray-200 pt-6 font-medium">
                            <span>Total</span>
                            <span>LKR {{ number_format($total) }}</span>
                        </div>

                        <a href="{{ route('checkout.create') }}"
                            class="block w-full bg-black text-white text-center py-4 text-xs uppercase tracking-[0.2em] hover:bg-gray-800 transition-all duration-300">
                            Checkout for Payment
                        </a>

                        <div class="mt-8 text-center">
                            <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-2">We Accept</p>
                            <div class="flex justify-center gap-2 opacity-50 grayscale">
                                <!-- Icons can go here -->
                                <span class="w-8 h-5 bg-gray-200 block"></span>
                                <span class="w-8 h-5 bg-gray-200 block"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart State -->
            <div class="flex flex-col items-center justify-center py-20 min-h-[40vh]">
                <p class="text-xl text-gray-400 font-light italic mb-8">Your bag is currently empty.</p>
                <a href="{{ route('shop.index') }}"
                    class="px-10 py-3 border border-black text-black hover:bg-black hover:text-white transition-all text-xs uppercase tracking-[0.2em]">
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</div>