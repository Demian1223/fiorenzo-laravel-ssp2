<x-app-layout>
    <!-- Hero Section with Video -->
    <div class="relative h-screen w-full overflow-hidden">
        <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover">
            <source src="{{ asset('videos/OurStory.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
            <h1
                class="text-white text-display font-['Cormorant_Garamond'] text-6xl md:text-8xl tracking-wider text-center uppercase drop-shadow-2xl">
                Our Story
            </h1>
        </div>
    </div>

    <!-- Content Section -->
    <div class="bg-[#fafafa] py-20 px-6 md:px-12 lg:px-24">
        <div class="max-w-4xl mx-auto text-center space-y-16">

            <!-- Intro -->
            <div class="space-y-6 animate-fade-in-up">
                <p class="font-['Cormorant_Garamond'] text-2xl md:text-3xl text-gray-800 leading-relaxed italic">
                    "Luxury fashion has always been admired but not always accessible."
                </p>
                <div class="w-24 h-px bg-[#8b0000] mx-auto"></div>
                <p class="font-sans text-gray-600 text-lg leading-loose tracking-wide">
                    At FIORENZO, we noticed a gap. A gap where premium design, global fashion houses, and timeless style
                    existed — yet remained out of reach for many who truly appreciated it. Luxury should not feel
                    distant. It should feel possible.
                </p>
            </div>

            <!-- Mission -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center text-left">
                <div class="space-y-6">
                    <h2 class="font-['Cormorant_Garamond'] text-4xl text-[#8b0000] uppercase tracking-widest">
                        Redefining Access
                    </h2>
                    <p class="font-sans text-gray-600 text-lg leading-loose">
                        Inspired by iconic fashion houses such as <strong>Gucci, Dior, Louis Vuitton, and
                            Chanel</strong>, FIORENZO was founded with one clear purpose: to make elevated fashion more
                        accessible, transparent, and fair for Sri Lanka.
                    </p>
                    <p class="font-sans text-gray-600 text-lg leading-loose">
                        We carefully curate luxury-inspired collections that reflect international trends, refined
                        craftsmanship, and timeless elegance — without unnecessary markups.
                    </p>
                </div>
                <!-- Placeholder for an image or elegant graphic if desired, or just text layout -->
                <div class="border border-[#e5e5e5] p-8 bg-white shadow-sm">
                    <p class="font-['Cormorant_Garamond'] text-2xl text-gray-800 text-center italic">
                        "We carefully curate luxury-inspired collections that reflect international trends."
                    </p>
                </div>
            </div>

            <!-- Sourcing -->
            <div class="space-y-8">
                <h2 class="font-['Cormorant_Garamond'] text-4xl text-gray-900 uppercase tracking-widest">
                    Sourced Globally. Delivered Locally.
                </h2>
                <p class="font-sans text-gray-600 text-lg leading-loose max-w-2xl mx-auto">
                    Our products are sourced and shipped directly from the United States, allowing us to maintain strict
                    quality standards while reducing intermediaries.
                </p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 font-['Cormorant_Garamond'] text-xl text-[#8b0000]">
                    <div class="p-4 border border-[#eee] bg-white">Better Pricing</div>
                    <div class="p-4 border border-[#eee] bg-white">Authentic Materials</div>
                    <div class="p-4 border border-[#eee] bg-white">Careful Logistics</div>
                    <div class="p-4 border border-[#eee] bg-white">No Compromise</div>
                </div>
            </div>

            <!-- Delivery -->
            <div class="py-12 bg-white border-y border-[#eee]">
                <h2 class="font-['Cormorant_Garamond'] text-3xl text-gray-800 uppercase tracking-widest mb-6">
                    Island-Wide Delivery
                </h2>
                <p class="font-sans text-gray-600 text-lg leading-loose">
                    Whether you’re in Colombo or anywhere across Sri Lanka, FIORENZO delivers island-wide, bringing
                    global fashion directly to your doorstep.
                    <br><br>
                    <span class="font-['Cormorant_Garamond'] text-2xl text-[#8b0000] italic">"Luxury is not a location.
                        It’s a feeling."</span>
                </p>
            </div>

            <!-- Values / Closing -->
            <div class="space-y-8">
                <h2 class="font-['Cormorant_Garamond'] text-4xl text-gray-900 uppercase tracking-widest">
                    The Fiorenzo Promise
                </h2>
                <div
                    class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-12 font-sans text-lg text-gray-600">
                    <span class="flex items-center justify-center"><span
                            class="w-1.5 h-1.5 bg-[#8b0000] rounded-full mr-3"></span>Confidence without excess</span>
                    <span class="flex items-center justify-center"><span
                            class="w-1.5 h-1.5 bg-[#8b0000] rounded-full mr-3"></span>Elegance without barriers</span>
                    <span class="flex items-center justify-center"><span
                            class="w-1.5 h-1.5 bg-[#8b0000] rounded-full mr-3"></span>Style without compromise</span>
                </div>

                <div class="mt-12 pt-12 border-t border-[#eee]">
                    <p class="font-['Cormorant_Garamond'] text-3xl text-gray-800 mb-2">
                        Welcome to a new standard of luxury.
                    </p>
                    <p class="font-['Cormorant_Garamond'] text-5xl text-[#8b0000] tracking-widest uppercase mt-4">
                        Fiorenzo
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>