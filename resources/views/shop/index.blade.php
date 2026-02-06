<x-app-layout>
    <!-- Hero Section -->
    <section class="relative h-[60vh] w-full overflow-hidden bg-black">
        <!-- Image Background -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-black/40 z-10 w-full h-full"></div>
            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2070&auto=format&fit=crop"
                alt="Shop" class="w-full h-full object-cover">
        </div>

        <!-- Hero Content -->
        <div
            class="absolute inset-0 z-20 flex flex-col justify-center items-center text-white px-8 text-center font-serif">
            <p class="text-xs md:text-sm uppercase tracking-[0.3em] mb-4 opacity-90">Discover the Collection</p>
            <h2 class="text-5xl md:text-7xl font-light tracking-wide mb-6">The Shop</h2>
        </div>
    </section>

    <!-- Sticky Header & Sort Bar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-100 font-serif">
        <!-- Top Category Navigation -->
        <div class="max-w-[1920px] mx-auto px-6 lg:px-12 py-6 text-center">
            <nav
                class="flex items-center justify-center gap-8 md:gap-12 overflow-x-auto no-scrollbar whitespace-nowrap">
                <a href="{{ route('shop.index') }}"
                    class="text-[13px] uppercase tracking-[0.2em] transition-all duration-300 hover:text-black hover:italic {{ !request('category') ? 'text-black border-b border-black' : 'text-gray-400 border-b border-transparent' }}">
                    All
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('shop.index', ['category' => $category->slug]) }}"
                        class="text-[13px] uppercase tracking-[0.2em] transition-all duration-300 hover:text-black hover:italic {{ request('category') == $category->slug ? 'text-black border-b border-black' : 'text-gray-400 border-b border-transparent' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </nav>
        </div>
    </header>

    <main class="max-w-[1920px] mx-auto px-6 lg:px-12 py-10 font-serif">
        <livewire:product-listing :categorySlug="request('category')" />
    </main>
</x-app-layout>