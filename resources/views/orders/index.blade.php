<x-app-layout>
    <div class="min-h-screen bg-white text-[#1b1b1b] font-serif">

        <!-- Hero Section -->
        <section class="relative w-full overflow-hidden bg-gray-900">
            <!-- Hero Image -->
            <img src="{{ asset('images/OTHER/Order.jpg') }}" alt="Orders Hero" class="w-full h-auto block">

            <!-- Dark Overlay (Explicit with inline style for safety) -->
            <div class="absolute inset-0 bg-black/75" style="background-color: rgba(0,0,0,0.75);"></div>

            <!-- Navbar Gradient Protection -->
            <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/90 to-transparent"></div>

            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-6xl text-white tracking-[0.15em] font-light uppercase z-10"
                    style="font-family: 'Cormorant Garamond', serif;">
                    My Orders
                </h1>
            </div>
        </section>

        <div class="max-w-4xl mx-auto px-6 lg:px-8 py-16">

            @if($orders->count() > 0)
                <div class="space-y-6">
                    @foreach($orders as $order)
                        <a href="{{ route('orders.show', $order->id) }}" class="block group">
                            <div
                                class="border border-gray-200 p-6 flex flex-col md:flex-row justify-between items-center transition-all duration-300 hover:shadow-md hover:border-black bg-white">

                                <div class="flex flex-col gap-1 mb-4 md:mb-0">
                                    <span class="text-xs text-gray-400 uppercase tracking-widest">Order Number</span>
                                    <span
                                        class="text-xl font-serif text-black group-hover:underline decoration-1 underline-offset-4"
                                        style="font-family: 'Cormorant Garamond', serif;">
                                        #{{ $order->id }}
                                    </span>
                                </div>

                                <div class="flex flex-col gap-1 mb-4 md:mb-0">
                                    <span class="text-xs text-gray-400 uppercase tracking-widest">Date</span>
                                    <span class="text-base font-serif text-black">
                                        {{ $order->created_at->format('M d, Y') }}
                                    </span>
                                </div>

                                <div class="flex flex-col gap-1 mb-4 md:mb-0">
                                    <span class="text-xs text-gray-400 uppercase tracking-widest">Status</span>
                                    <span
                                        class="text-xs font-bold uppercase tracking-wider px-3 py-1 bg-gray-100 rounded-full 
                                                                                                                {{ $order->status === 'paid' ? 'text-green-800 bg-green-50' : 'text-gray-800' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>

                                <div class="flex flex-col gap-1 mb-4 md:mb-0">
                                    <span class="text-xs text-gray-400 uppercase tracking-widest text-right">Total</span>
                                    <span class="text-xl font-serif text-black text-right"
                                        style="font-family: 'Cormorant Garamond', serif;">
                                        LKR {{ number_format($order->total_amount) }}
                                    </span>
                                </div>

                                <!-- View Order Button -->
                                <div>
                                    <span
                                        class="px-6 py-2 border border-black text-xs uppercase tracking-widest hover:bg-black hover:text-white transition-colors duration-300">
                                        View Order
                                    </span>
                                </div>

                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <p class="text-gray-500 mb-6 text-lg" style="font-family: 'Cormorant Garamond', serif;">You haven't
                        placed any orders yet.</p>
                    <a href="{{ route('shop.index') }}"
                        class="px-8 py-3 bg-black text-white text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors inline-block">
                        Start Shopping
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>