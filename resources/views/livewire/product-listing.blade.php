<div>
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <!-- Search Bar -->
        <div class="relative w-full md:w-64">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="SEARCH PRODUCTS..."
                class="w-full bg-transparent border-b border-gray-200 focus:border-black py-2 pl-0 pr-8 text-sm uppercase tracking-widest placeholder-gray-400 focus:ring-0 font-serif">
            <div class="absolute right-0 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>

        <!-- Sort Dropdown -->
        <select wire:model.live="sort"
            class="border-gray-200 text-sm uppercase tracking-widest focus:ring-0 focus:border-black font-serif bg-transparent w-full md:w-auto">
            <option value="">Sort By</option>
            <option value="price_asc">Price: Low to High</option>
            <option value="price_desc">Price: High to Low</option>
        </select>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-12 md:gap-y-16">
        @foreach($products as $product)
            <div class="group cursor-pointer flex flex-col" wire:key="product-{{ $product->id }}">
                <!-- Image Container -->
                <div class="relative w-full aspect-[3/4] overflow-hidden bg-[#F5F5F5] mb-5">
                    <a href="{{ route('products.show', $product->slug) }}" class="block w-full h-full">
                        <img src="{{ !empty($product->image_url) ? (Str::startsWith($product->image_url, ['http', 'https']) ? $product->image_url : asset($product->image_url)) : 'https://placehold.co/800x1066' }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover object-center transition-transform duration-1000 ease-out group-hover:scale-105" />
                    </a>
                </div>

                <!-- Product Info -->
                <div class="flex flex-col items-center text-center gap-1.5">
                    <h3
                        class="text-[15px] text-gray-900 leading-snug tracking-wide group-hover:italic transition-all font-serif">
                        <a href="{{ route('products.show', $product->slug) }}">
                            {{ $product->name }}
                        </a>
                    </h3>
                    <p class="text-[14px] text-gray-600 tracking-wider font-serif">
                        LKR {{ number_format($product->price, 0) }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Spacer -->
    <div class="h-16 w-full"></div>

    <!-- Pagination -->
    <div class="flex justify-center pb-20">
        {{ $products->links() }}
    </div>
</div>