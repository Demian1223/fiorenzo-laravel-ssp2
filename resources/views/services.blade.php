<x-app-layout>
    <!-- Hero Section -->
    <!-- Hero Section -->
    <div class="relative h-screen w-full overflow-hidden">
        <img src="{{ asset('images/OTHER/services.jpg') }}" class="absolute top-0 left-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <h1
                class="text-white text-display font-['Cormorant_Garamond'] text-6xl md:text-8xl tracking-wider text-center uppercase drop-shadow-2xl">
                Our Services
            </h1>
        </div>
    </div>

    <!-- Content -->
    <div class="bg-[#fafafa] py-20 px-6 md:px-12 lg:px-24">
        <div class="max-w-4xl mx-auto space-y-16">

            <!-- Intro -->
            <div class="text-center space-y-6 animate-fade-in-up">
                <p class="font-['Cormorant_Garamond'] text-2xl md:text-3xl text-gray-800 leading-relaxed italic">
                    "At Fiorenzo, we go beyond fashion."
                </p>
                <div class="w-24 h-px bg-[#8b0000] mx-auto"></div>
                <p class="font-sans text-gray-600 text-lg leading-loose tracking-wide">
                    Our services are designed to make luxury accessible, seamless, and trustworthy—bringing the world’s
                    most iconic styles closer to you.
                </p>
            </div>

            <!-- Service Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Curated Luxury -->
                <div class="bg-white p-8 border border-[#eee] hover:shadow-lg transition duration-300">
                    <h3 class="font-['Cormorant_Garamond'] text-3xl text-[#8b0000] mb-4">Curated Luxury Collections</h3>
                    <p class="font-sans text-gray-600 leading-relaxed">
                        We carefully curate our collections to reflect modern luxury and timeless elegance. Each piece
                        is selected for its quality, craftsmanship, and design.
                    </p>
                </div>

                <!-- Global Sourcing -->
                <div class="bg-white p-8 border border-[#eee] hover:shadow-lg transition duration-300">
                    <h3 class="font-['Cormorant_Garamond'] text-3xl text-[#8b0000] mb-4">Global Sourcing</h3>
                    <p class="font-sans text-gray-600 leading-relaxed">
                        Sourced directly through trusted international suppliers. We work closely with global fashion
                        markets to bring inspired collections influenced by iconic luxury houses.
                    </p>
                </div>

                <!-- Int'l Shipping -->
                <div class="bg-white p-8 border border-[#eee] hover:shadow-lg transition duration-300">
                    <h3 class="font-['Cormorant_Garamond'] text-3xl text-[#8b0000] mb-4">Direct International Shipping
                    </h3>
                    <p class="font-sans text-gray-600 leading-relaxed">
                        We manage international logistics end-to-end, sourcing products overseas and shipping them
                        directly to Sri Lanka to reduce costs and ensure quality.
                    </p>
                </div>

                <!-- Island-Wide -->
                <div class="bg-white p-8 border border-[#eee] hover:shadow-lg transition duration-300">
                    <h3 class="font-['Cormorant_Garamond'] text-3xl text-[#8b0000] mb-4">Island-Wide Delivery</h3>
                    <p class="font-sans text-gray-600 leading-relaxed">
                        No matter where you are in Sri Lanka, Fiorenzo delivers. Our reliable island-wide shipping
                        network ensures your order reaches you safely and on time.
                    </p>
                </div>

                <!-- Quality -->
                <div class="bg-white p-8 border border-[#eee] hover:shadow-lg transition duration-300">
                    <h3 class="font-['Cormorant_Garamond'] text-3xl text-[#8b0000] mb-4">Quality Assurance</h3>
                    <p class="font-sans text-gray-600 leading-relaxed">
                        Every item goes through strict quality checks before dispatch. From materials to finishing, we
                        ensure each product meets our standards.
                    </p>
                </div>

                <!-- Support -->
                <div class="bg-white p-8 border border-[#eee] hover:shadow-lg transition duration-300">
                    <h3 class="font-['Cormorant_Garamond'] text-3xl text-[#8b0000] mb-4">Customer-First Support</h3>
                    <p class="font-sans text-gray-600 leading-relaxed">
                        Always here to help—whether you need styling advice, order assistance, or after-purchase
                        support. Luxury comes with care.
                    </p>
                </div>
            </div>

            <!-- Closing -->
            <div class="text-center pt-12 border-t border-[#eee]">
                <h2 class="font-['Cormorant_Garamond'] text-3xl text-gray-800 mb-6">
                    Fashion That Fits Your Lifestyle
                </h2>
                <p class="font-sans text-gray-600 text-lg leading-loose max-w-2xl mx-auto">
                    From everyday essentials to statement pieces, Fiorenzo offers fashion designed to suit modern
                    lifestyles—balancing elegance, comfort, and individuality.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>