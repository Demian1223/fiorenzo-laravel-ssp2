<x-app-layout>
    <div x-data="{ 
            activeImageIndex: 0,
            images: [
                '{{ Str::startsWith($product->image_url, ['http', 'https']) ? $product->image_url : asset($product->image_url) }}'
            ],
            loaded: false,
            nextImage() {
                this.activeImageIndex = (this.activeImageIndex + 1) % this.images.length;
            },
            prevImage() {
                this.activeImageIndex = (this.activeImageIndex - 1 + this.images.length) % this.images.length;
            }
        }" x-init="setTimeout(() => loaded = true, 100)"
        class="min-h-screen bg-white text-neutral-900 font-serif selection:bg-neutral-200 pt-24 lg:pt-28">
        <!-- Changed font-sans to font-serif globally above -->

        <!-- Main Container -->
        <main class="w-full max-w-[1800px] mx-auto px-4 sm:px-6 lg:px-8">

            <!-- GRID LAYOUT -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 xl:gap-24 min-h-[80vh]">

                <!-- LEFT COLUMN: IMAGE -->
                <section
                    class="lg:col-span-7 bg-[#F5F5F5] relative group flex items-center justify-center overflow-hidden h-[60vh] lg:h-auto min-h-[500px] rounded-sm">
                    <template x-for="(image, index) in images" :key="index">
                        <img x-show="activeImageIndex === index" x-transition:enter="transition ease-out duration-700"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            :src="image" alt="{{ $product->name }}"
                            class="max-h-[90%] max-w-[90%] object-contain mix-blend-multiply transition-transform duration-1000 hover:scale-105" />
                    </template>

                    <!-- Navigation Arrows -->
                    <div x-show="images.length > 1"
                        class="absolute inset-x-0 flex justify-between px-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                        <button @click="prevImage()"
                            class="bg-white/90 p-3 rounded-full hover:bg-white shadow-sm pointer-events-auto transform hover:scale-105 transition-all">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.0">
                                <path d="M15 18l-6-6 6-6" />
                            </svg>
                        </button>
                        <button @click="nextImage()"
                            class="bg-white/90 p-3 rounded-full hover:bg-white shadow-sm pointer-events-auto transform hover:scale-105 transition-all">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.0">
                                <path d="M9 18l6-6-6-6" />
                            </svg>
                        </button>
                    </div>


                    <!-- Dots -->
                    <div x-show="images.length > 1" class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3">
                        <template x-for="(image, index) in images" :key="index">
                            <button @click="activeImageIndex = index"
                                class="transition-all duration-300 rounded-full border border-black/30"
                                :class="activeImageIndex === index ? 'bg-black w-2 h-2 scale-110' : 'bg-transparent w-2 h-2 hover:border-black/60'">
                            </button>
                        </template>
                    </div>
                </section>

                <!-- RIGHT COLUMN: DETAILS -->
                <section class="lg:col-span-5 flex flex-col justify-center text-left py-8 pl-0 lg:pl-4">
                    <div class="w-full max-w-lg">



                        <!-- Brand & Title -->
                        <div class="mb-12">

                            <h1 class="text-5xl lg:text-7xl font-medium text-neutral-900 leading-[0.9] mb-6 -ml-1">
                                {{ $product->name }}
                            </h1>
                            <p class="text-3xl text-neutral-900 italic font-light tracking-wide">
                                LKR {{ number_format($product->price, 0) }}
                            </p>
                        </div>


                        <!-- Info Sections (Static) -->
                        <div class="pt-10 space-y-10 text-center mb-10">
                            <!-- Product Details -->
                            <div class="space-y-6 max-w-md mx-auto">
                                <h3 class="text-sm font-bold uppercase tracking-[0.2em] text-neutral-900">
                                    Product Details
                                </h3>
                                <div class="text-neutral-600 leading-loose text-lg italic font-light text-left">
                                    {{ $product->description ?? 'Crafted with precision and elegance, this piece embodies the essence of luxury.' }}
                                </div>
                            </div>

                            <!-- Shipping & Returns -->
                            <div class="space-y-6 max-w-md mx-auto">
                                <h3 class="text-sm font-bold uppercase tracking-[0.2em] text-neutral-900">
                                    Shipping & Returns
                                </h3>
                                <div class="text-neutral-600 leading-loose text-lg italic font-light text-left">
                                    Complimentary shipping on all orders. Returns accepted within 30 days.
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-col items-center gap-5 mb-12">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-black text-white border border-black px-10 py-3 text-xs uppercase tracking-[0.2em] hover:bg-white hover:text-black transition-all duration-300 shadow-sm flex items-center justify-center gap-4 group rounded-none">
                                    <span class="font-semibold">Add to Bag</span>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.2"
                                        class="group-hover:translate-x-1 transition-transform duration-300">
                                        <path d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                    </div>
                </section>
            </div>

            <!-- You May Also Like -->
            <section class="py-24 border-t border-neutral-100 mt-40">
                <div class="text-center mb-16">
                    <h3 class="text-3xl italic font-medium tracking-wider mb-4">You May Also Like</h3>
                    <!-- Decorative line -->
                    <div class="w-16 h-[1px] bg-neutral-300 mx-auto"></div>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-12">
                    @foreach($relatedProducts as $related)
                        <div class="group cursor-pointer">
                            <div class="aspect-[3/4] overflow-hidden bg-[#F9F9F9] mb-6 relative">
                                <a href="{{ route('products.show', $related->slug) }}" class="block w-full h-full">
                                    <img src="{{ Str::startsWith($related->image_url, ['http', 'https']) ? $related->image_url : asset($related->image_url) }}"
                                        alt="{{ $related->name }}"
                                        class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" />
                                </a>
                                <!-- Quick Add Overlay -->
                                <div
                                    class="absolute inset-x-0 bottom-0 p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex justify-center">
                                    <form action="{{ route('cart.add', $related->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-white text-black px-6 py-3 text-[10px] uppercase tracking-[0.2em] shadow-lg hover:bg-black hover:text-white transition-colors duration-300">
                                            Quick Add
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <h4 class="text-[10px] uppercase tracking-[0.25em] font-bold mb-2 text-neutral-400">FIORENZO
                            </h4>
                            <a href="{{ route('products.show', $related->slug) }}"
                                class="block text-xl text-neutral-900 mb-2 hover:underline underline-offset-4 decoration-neutral-300 italic">
                                {{ $related->name }}
                            </a>
                            <p class="text-base text-neutral-600 italic">LKR {{ number_format($related->price, 0) }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
</x-app-layout>