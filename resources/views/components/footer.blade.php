<footer class="bg-black text-gray-400">

    {{-- TOP SECTION: Newsletter (Left Aligned) --}}
    <div class="max-w-[90%] mx-auto" style="padding-top: 100px; padding-bottom: 60px;">
        <div class="flex flex-col md:flex-row justify-between items-start">

            {{-- Newsletter Component --}}
            <div class="w-full md:w-1/3">
                <p class="text-white text-xs tracking-[0.25em] font-semibold mb-8 uppercase"
                    style="font-family: 'Cormorant Garamond', serif;">
                    Sign up for Fiorenzo updates
                </p>

                <form action="#" method="POST" class="max-w-md">
                    @csrf
                    <div class="flex items-center border-b border-white/20 pb-2">
                        <input type="email" name="email" placeholder="Email Address"
                            class="bg-transparent w-full text-sm text-white placeholder-white/40 focus:outline-none tracking-wide"
                            required />
                        <button type="submit" class="text-white/60 hover:text-white transition ml-2">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>

                    <p class="text-[11px] mt-5 text-white/40 leading-relaxed">
                        By entering your email address below, you consent to receiving our newsletter with access to our
                        latest collections, events and initiatives.
                    </p>
                </form>
            </div>

        </div>
    </div>


    {{-- BOTTOM BRANDING SECTION --}}
    <div class="w-full flex flex-col items-center justify-center pt-16 pb-12 overflow-hidden">

        {{-- MASSIVE LOGO --}}
        {{-- MASSIVE LOGO --}}
        <div class="select-none text-center w-full leading-none">
            <h1 class="font-serif text-white tracking-widest opacity-95 scale-x-125 origin-center"
                style="font-size: 15vw; line-height: 0.8;">
                FIORENZO
            </h1>
        </div>

        {{-- Spacing Wrapper for Bottom Elements --}}
        <div class="mt-16 md:mt-20 flex flex-col items-center gap-6" style="font-family: 'Cormorant Garamond', serif;">

            {{-- Shipping/Language --}}
            <div
                class="flex flex-wrap justify-center gap-8 text-[10px] tracking-[0.25em] text-white/40 uppercase font-medium">
                <span class="hover:text-white transition cursor-pointer">Shipping to: Sri Lanka</span>
                <span class="cursor-not-allowed text-white/20">|</span>
                <span class="hover:text-white transition cursor-pointer">Language: English</span>
            </div>

            {{-- Payment Methods --}}
            <div class="flex flex-wrap justify-center gap-3">
                @foreach(['Visa', 'Mastercard', 'Amex', 'PayPal', 'Apple Pay'] as $method)
                    <span
                        class="border border-white/10 px-3 py-1 text-[9px] tracking-[0.2em] text-white/30 rounded-sm hover:border-white/30 hover:text-white/60 transition cursor-default">
                        {{ strtoupper($method) }}
                    </span>
                @endforeach
            </div>

            {{-- Copyright --}}
            <div class="text-[10px] text-white/20 tracking-widest mt-4">
                © {{ date('Y') }} FIORENZO
            </div>
        </div>
    </div>

</footer>