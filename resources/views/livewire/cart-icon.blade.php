<a href="{{ route('cart.index') }}" class="p-1 hover:opacity-60 transition-opacity duration-300 group relative"
    aria-label="Shopping Bag">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
        <path d="M3 6h18" />
        <path d="M16 10a4 4 0 0 1-8 0" />
    </svg>
    @if($count > 0)
        <span
            class="absolute -top-1 -right-1 bg-black text-white text-[9px] w-4 h-4 flex items-center justify-center rounded-full transition-all duration-300 scale-100">
            {{ $count }}
        </span>
    @endif
</a>