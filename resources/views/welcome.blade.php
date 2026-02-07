<x-app-layout>
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-[#8b0000] selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center flex-col items-center">
                <h1 class="text-6xl font-serif tracking-widest uppercase mb-4"
                    style="font-family: 'Cormorant Garamond', serif;">FIORENZO</h1>
                <p class="text-sm tracking-widest text-gray-400 uppercase">Luxury Fashion & Accessories</p>
            </div>
            <div class="mt-12 text-center">
                <a href="{{ route('shop.index') }}"
                    class="px-8 py-3 bg-black text-white text-xs uppercase tracking-widest hover:bg-gray-800 transition-colors">
                    Enter the Shop
                </a>
            </div>
        </div>
    </div>
</x-app-layout>