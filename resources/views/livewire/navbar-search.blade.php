<div class="relative" x-data="{ open: false }" @click.away="open = false">
    <div class="flex items-center border-b border-gray-300 focus-within:border-black transition-colors duration-300">
        <input type="text" wire:model.live.debounce.300ms="search" @focus="open = true" @input="open = true"
            placeholder="SEARCH"
            class="bg-transparent border-none text-[13px] uppercase tracking-[0.2em] w-32 md:w-48 placeholder-gray-400 focus:ring-0 px-0 py-1"
            style="font-family: 'Cormorant Garamond', serif;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
            class="text-gray-400">
            <circle cx="11" cy="11" r="8" />
            <line x1="21" x2="16.65" y1="21" y2="16.65" />
        </svg>
    </div>

    @if(strlen($search) >= 2 && count($results) > 0)
        <div x-show="open" x-transition
            class="absolute top-full left-0 w-64 bg-white shadow-lg border border-gray-100 z-50 mt-2 p-2">
            <ul>
                @foreach($results as $product)
                    <li>
                        <a href="{{ route('products.show', $product->slug) }}"
                            class="flex items-center gap-3 p-2 hover:bg-gray-50 transition-colors">
                            <img src="{{ Str::startsWith($product->image_url, ['http', 'https']) ? $product->image_url : asset($product->image_url) }}"
                                alt="{{ $product->name }}" class="w-8 h-10 object-cover">
                            <div class="flex flex-col">
                                <span
                                    class="text-xs uppercase tracking-wider font-medium font-serif">{{ $product->name }}</span>
                                <span class="text-[10px] text-gray-500">LKR {{ number_format($product->price) }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @elseif(strlen($search) >= 2 && count($results) === 0)
        <div x-show="open" x-transition
            class="absolute top-full left-0 w-64 bg-white shadow-lg border border-gray-100 z-50 mt-2 p-4 text-center">
            <span class="text-xs text-gray-500 font-serif italic">No results found.</span>
        </div>
    @endif
</div>