<x-app-layout>
    <!-- Hero Section -->
    <section class="relative h-screen w-full overflow-hidden bg-[#8b0000]">
        <!-- Video Background -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-black/20 z-10 w-full h-full"></div>
            <video src="{{ asset('videos/Valentine_Men.mp4') }}" autoplay muted loop playsinline
                class="w-full h-full object-cover"></video>
        </div>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-transparent to-transparent z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent z-10"></div>

        <!-- Hero Content -->
        <div class="absolute inset-0 z-20 flex flex-col justify-end items-start
           text-white px-8 md:px-16 pb-24 md:pb-48 text-left font-serif">
            <p class="text-xs md:text-sm uppercase tracking-[0.3em] mb-4 opacity-90">This Valentine’s Ryan Gosling</p>
            <h2 class="text-5xl md:text-6xl font-light tracking-wide mb-6">Men</h2>

        </div>
    </section>


    <!-- Sticky Header & Sort Bar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-100 font-serif"
        x-data="{ activeCategory: '{{ request('category', 'All') }}' }">

        <!-- Top Category Navigation -->
        <div class="max-w-[1920px] mx-auto px-6 lg:px-12 py-6 text-center">
            <nav
                class="flex items-center justify-center gap-8 md:gap-12 overflow-x-auto no-scrollbar whitespace-nowrap">
                <a href="{{ route('shop.men') }}"
                    class="text-[13px] uppercase tracking-[0.2em] transition-all duration-300 hover:text-black hover:italic {{ !request('category') ? 'text-black border-b border-black' : 'text-gray-400 border-b border-transparent' }}">
                    Men
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('shop.men', ['category' => $category->slug]) }}"
                        class="text-[13px] uppercase tracking-[0.2em] transition-all duration-300 hover:text-black hover:italic {{ request('category') == $category->slug ? 'text-black border-b border-black' : 'text-gray-400 border-b border-transparent' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </nav>
        </div>
    </header>

    <main class="max-w-[1920px] mx-auto px-6 lg:px-12 py-10 font-serif">
        <livewire:product-listing gender="men" :categorySlug="request('category')" />
    </main></x-app-layout>