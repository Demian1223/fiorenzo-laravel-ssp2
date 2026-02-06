<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-12 font-['Cormorant_Garamond']">
        <h1 class="text-4xl text-center mb-12 tracking-widest uppercase font-light">Checkout</h1>

        <div class="flex flex-col lg:flex-row gap-16">
            <!-- Left: Checkout Form -->
            <div class="w-full lg:w-2/3">
                <form action="{{ route('checkout.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <div>
                        <h2 class="text-xl uppercase tracking-widest mb-6 border-b border-gray-100 pb-2">Shipping
                            Information</h2>

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500">First Name</label>
                                <input type="text" name="first_name" required value="{{ old('first_name') }}"
                                    class="w-full border-b border-gray-200 py-2 focus:outline-none focus:border-black transition-colors bg-transparent placeholder-transparent"
                                    placeholder="First Name">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500">Last Name</label>
                                <input type="text" name="last_name" required value="{{ old('last_name') }}"
                                    class="w-full border-b border-gray-200 py-2 focus:outline-none focus:border-black transition-colors bg-transparent placeholder-transparent"
                                    placeholder="Last Name">
                            </div>
                        </div>

                        <div class="space-y-2 mt-6">
                            <label class="text-xs uppercase tracking-widest text-gray-500">Email Address</label>
                            <input type="email" name="email" required value="{{ old('email') }}"
                                class="w-full border-b border-gray-200 py-2 focus:outline-none focus:border-black transition-colors bg-transparent placeholder-transparent"
                                placeholder="Email">
                        </div>

                        <div class="space-y-2 mt-6">
                            <label class="text-xs uppercase tracking-widest text-gray-500">Phone Number</label>
                            <input type="tel" name="phone" required value="{{ old('phone') }}"
                                class="w-full border-b border-gray-200 py-2 focus:outline-none focus:border-black transition-colors bg-transparent placeholder-transparent"
                                placeholder="Phone">
                        </div>

                        <div class="space-y-2 mt-6">
                            <label class="text-xs uppercase tracking-widest text-gray-500">Address</label>
                            <input type="text" name="address" required value="{{ old('address') }}"
                                class="w-full border-b border-gray-200 py-2 focus:outline-none focus:border-black transition-colors bg-transparent placeholder-transparent"
                                placeholder="Address">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500">City</label>
                                <input type="text" name="city" required value="{{ old('city') }}"
                                    class="w-full border-b border-gray-200 py-2 focus:outline-none focus:border-black transition-colors bg-transparent placeholder-transparent"
                                    placeholder="City">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500">Postal Code</label>
                                <input type="text" name="zip" required value="{{ old('zip') }}"
                                    class="w-full border-b border-gray-200 py-2 focus:outline-none focus:border-black transition-colors bg-transparent placeholder-transparent"
                                    placeholder="Postal Code">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-xl uppercase tracking-widest mb-6 border-b border-gray-100 pb-2">Payment</h2>
                        <p class="text-sm text-gray-500 italic">Payment will be collected upon delivery or via email
                            link after order confirmation.</p>
                    </div>

                    <button type="submit"
                        class="w-full bg-black text-white py-4 text-sm font-bold uppercase tracking-[0.2em] hover:bg-gray-800 transition-colors mt-8">
                        Place Order
                    </button>
                </form>
            </div>

            <!-- Right: Order Summary -->
            <div class="w-full lg:w-1/3">
                <div class="bg-gray-50 p-8 sticky top-32">
                    <h3 class="text-sm font-bold uppercase tracking-widest mb-6 border-b border-gray-200 pb-4">Your
                        Order</h3>

                    <div class="space-y-4 mb-6">
                        @if(isset($cart) && count($cart) > 0)
                            @foreach($cart as $id => $details)
                                <div class="flex gap-4">
                                    <div
                                        class="w-16 h-16 bg-gray-200 border border-gray-300 flex-shrink-0 relative overflow-hidden flex items-center justify-center">
                                        <img src="{{ !empty($details['image_url']) ? $details['image_url'] : asset('images/no-image.png') }}"
                                            class="w-full h-full object-cover" onerror="this.style.display='none'">
                                        <span class="text-[10px] text-gray-400 absolute">No Img</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-sm font-serif">{{ $details['name'] }}</h4>
                                        <p class="text-xs text-gray-500 mt-1">Qty: {{ $details['quantity'] }}</p>
                                        <p class="text-sm mt-1">LKR
                                            {{ number_format($details['price'] * $details['quantity'], 0) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-sm text-gray-500">Your cart is empty.</p>
                        @endif
                    </div>

                    <div class="border-t border-gray-200 pt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span>Subtotal</span>
                            <span>LKR {{ number_format($subtotal, 0) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span>Delivery</span>
                            <span>LKR {{ number_format($delivery, 0) }}</span>
                        </div>
                        <div class="flex justify-between text-xl font-medium pt-4 mt-4 border-t border-gray-200">
                            <span>Total</span>
                            <span>LKR {{ number_format($total, 0) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>