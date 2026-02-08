<x-app-layout>
    <!-- Hero Section with Video -->
    <div class="relative h-screen w-full overflow-hidden">
        <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover">
            <source src="{{ asset('videos/Ethics.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
            <h1
                class="text-white text-display font-['Cormorant_Garamond'] text-6xl md:text-8xl tracking-wider text-center uppercase drop-shadow-2xl">
                Ethics & Responsibility
            </h1>
        </div>
    </div>

    <!-- Content Section -->
    <div class="bg-[#fafafa] py-20 px-6 md:px-12 lg:px-24">
        <div class="max-w-4xl mx-auto text-center space-y-16">

            <!-- Intro -->
            <div class="space-y-6 animate-fade-in-up">
                <p class="font-['Cormorant_Garamond'] text-2xl md:text-3xl text-gray-800 leading-relaxed italic">
                    "At FIORENZO, ethics are not a trend. They are the foundation of everything we do."
                </p>
                <div class="w-24 h-px bg-[#8b0000] mx-auto"></div>
                <p class="font-sans text-gray-600 text-lg leading-loose tracking-wide">
                    Luxury should feel good — not just in how it looks, but in how it is made, sourced, and delivered.
                </p>
            </div>

            <!-- Responsible Sourcing -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center text-left">
                <div class="space-y-6 order-2 md:order-1">
                    <h2 class="font-['Cormorant_Garamond'] text-4xl text-[#8b0000] uppercase tracking-widest">
                        Responsible Sourcing
                    </h2>
                    <p class="font-sans text-gray-600 text-lg leading-loose">
                        Our collections are carefully sourced through trusted suppliers, with a focus on quality
                        materials, responsible production, and thoughtful selection. We value craftsmanship over mass
                        production and quality over excess.
                    </p>
                    <ul
                        class="font-['Cormorant_Garamond'] text-xl text-gray-800 space-y-2 list-disc pl-5 marker:text-[#8b0000]">
                        <li>Craftsmanship over mass production</li>
                        <li>Quality over excess</li>
                        <li>Long-lasting design over fast fashion cycles</li>
                    </ul>
                </div>
                <!-- Image or visual placeholder -->
                <div
                    class="border border-[#e5e5e5] p-8 bg-white shadow-sm flex items-center justify-center aspect-square order-1 md:order-2">
                    <p class="font-['Cormorant_Garamond'] text-3xl text-gray-400 italic">
                        "Each piece is chosen with intention — not volume."
                    </p>
                </div>
            </div>

            <!-- Fair Pricing -->
            <div class="space-y-8 bg-white p-10 border border-[#eee]">
                <h2 class="font-['Cormorant_Garamond'] text-4xl text-gray-900 uppercase tracking-widest">
                    Fair Pricing, Without Compromise
                </h2>
                <p class="font-sans text-gray-600 text-lg leading-loose max-w-3xl mx-auto">
                    We believe ethical fashion also means honest pricing. By sourcing directly and minimizing
                    unnecessary intermediaries, we avoid inflated markups that disconnect price from real value.
                </p>
                <div class="flex flex-wrap justify-center gap-6 font-['Cormorant_Garamond'] text-xl text-[#8b0000]">
                    <span class="px-4 py-2 bg-[#fafafa] border border-[#eee]">Premium Quality</span>
                    <span class="px-4 py-2 bg-[#fafafa] border border-[#eee]">Transparent Value</span>
                    <span class="px-4 py-2 bg-[#fafafa] border border-[#eee]">Fair Access</span>
                </div>
                <p class="font-['Cormorant_Garamond'] text-2xl text-gray-800 italic mt-4">
                    "Luxury should not rely on exploitation."
                </p>
            </div>

            <!-- Conscious Logistics -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center text-left">
                <div
                    class="border border-[#e5e5e5] p-8 bg-white shadow-sm flex items-center justify-center aspect-square">
                    <p class="font-['Cormorant_Garamond'] text-3xl text-gray-400 italic text-center">
                        "Efficiency is part of sustainability."
                    </p>
                </div>
                <div class="space-y-6">
                    <h2 class="font-['Cormorant_Garamond'] text-4xl text-[#8b0000] uppercase tracking-widest">
                        Conscious Logistics
                    </h2>
                    <p class="font-sans text-gray-600 text-lg leading-loose">
                        Our products are shipped directly from the United States to Sri Lanka, using efficient logistics
                        to reduce waste, delays, and unnecessary handling.
                    </p>
                    <p class="font-sans text-gray-600 text-lg leading-loose">
                        We focus on streamlined shipping, responsible packaging, and careful handling from origin to
                        delivery.
                    </p>
                </div>
            </div>

            <!-- Community & Closing -->
            <div class="py-12 border-t border-[#eee]">
                <h2 class="font-['Cormorant_Garamond'] text-3xl text-gray-800 uppercase tracking-widest mb-6">
                    Respect for Our Customers & Community
                </h2>
                <p class="font-sans text-gray-600 text-lg leading-loose max-w-2xl mx-auto mb-10">
                    We are committed to honest product descriptions, clear communication, and reliable island-wide
                    delivery. Trust is earned — and we protect it.
                </p>

                <h3 class="font-['Cormorant_Garamond'] text-2xl text-[#8b0000] uppercase tracking-widest mb-4">
                    Our Commitment
                </h3>
                <p class="font-['Cormorant_Garamond'] text-3xl text-gray-800 italic leading-snug">
                    "Ethical fashion is a journey — not a claim.<br>
                    At FIORENZO, we continue to evolve, improve, and choose responsibility wherever possible."
                </p>
                <p class="font-sans text-gray-500 text-sm mt-8 uppercase tracking-widest">
                    True luxury is built on integrity, intention, and respect.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>