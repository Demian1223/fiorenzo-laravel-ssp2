<x-app-layout>

    <div class="font-['Cormorant_Garamond']">

        <!-- Hero Section -->
        <section class="relative h-screen w-full overflow-hidden bg-[#8b0000]" x-data="{
                    currentHero: 0,
                    slides: [
                        {
                            video: '{{ asset('videos/hero_female.mp4') }}',
                            cta: 'DISCOVER THE WOMEN',
                            link: '{{ route('shop.women') }}'
                        },
                        {
                            video: '{{ asset('videos/hero_male.mp4') }}',
                            cta: 'DISCOVER THE MEN',
                            link: '{{ route('shop.men') }}'
                        }
                    ],
                    init() {
                        setInterval(() => {
                            this.currentHero = (this.currentHero + 1) % this.slides.length;
                        }, 6000);
                    }
                }">

            <!-- Background Images/Videos -->
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="currentHero === index" x-transition:enter="transition ease-out duration-[1500ms]"
                    x-transition:enter-start="opacity-0 scale-110" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-[1500ms]"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-100"
                    class="absolute inset-0">
                    <div class="absolute inset-0 bg-black/20 z-10 w-full h-full"></div>

                    <template x-if="slide.video">
                        <video :src="slide.video" autoplay muted loop playsinline
                            class="w-full h-full object-cover"></video>
                    </template>

                    <template x-if="!slide.video && slide.image">
                        <img :src="slide.image" class="w-full h-full object-cover object-top" alt="Hero">
                    </template>
                </div>
            </template>

            <!-- Hero Content -->
            <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-white px-6 text-center">
                <p class="text-[12px] lg:text-[14px] tracking-[0.4em] mb-4 uppercase"
                    x-text="slides[currentHero].subtitle"></p>

                <h2 class="text-4xl lg:text-7xl font-light tracking-[0.2em] mb-12" x-text="slides[currentHero].title">
                </h2>

                <a :href="slides[currentHero].link"
                    class="border border-white/40 bg-white/10 backdrop-blur-md px-10 py-4 text-[10px] tracking-[0.3em] font-medium hover:bg-white hover:text-black transition-all duration-300 uppercase">
                    <span x-text="slides[currentHero].cta"></span>
                </a>
            </div>

            <!-- Indicators -->
            <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-20 flex gap-4">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="currentHero = index" class="h-[2px] w-12 transition-all duration-300"
                        :class="currentHero === index ? 'bg-white' : 'bg-white/30'"></button>
                </template>
            </div>
        </section>


        <!-- Signature Styles (Latest Products) -->
        <section class="w-full bg-white py-24 px-6 lg:px-12 border-b border-gray-50" x-data="{ shown: false }"
            x-intersect.once="shown = true">
            <div class="max-w-[1440px] mx-auto">
                <div class="flex flex-col items-center mb-16 text-center">
                    <p class="text-[10px] tracking-[0.4em] text-[#8b0000] uppercase mb-4 opacity-0 transform translate-y-4 transition-all duration-700 delay-100"
                        :class="shown ? 'opacity-100 translate-y-0' : ''">Selected Pieces</p>
                    <h2 class="text-4xl lg:text-5xl font-light tracking-[0.2em] uppercase opacity-0 transform translate-y-4 transition-all duration-700 delay-200"
                        :class="shown ? 'opacity-100 translate-y-0' : ''"
                        style="font-family: 'Cormorant Garamond', serif;">Signature Styles</h2>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                    @foreach($products as $index => $product)
                        <div class="flex flex-col items-center group cursor-pointer opacity-0 transform translate-y-8 transition-all duration-1000"
                            :class="shown ? 'opacity-100 translate-y-0' : ''"
                            style="transition-delay: {{ 300 + ($index * 150) }}ms">

                            <div class="relative overflow-hidden w-full aspect-[3/4] bg-gray-50 mb-6">
                                <a href="{{ route('products.show', $product->slug) }}" class="block w-full h-full">
                                    <img src="{{ !empty($product->image_url) ? (Str::startsWith($product->image_url, ['http', 'https']) ? $product->image_url : asset($product->image_url)) : 'https://placehold.co/800x1066' }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                                </a>
                                <div
                                    class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                            </div>

                            <div class="text-center">
                                <p class="text-[11px] tracking-[0.3em] text-gray-400 uppercase mb-2">
                                    {{ $product->brand->name ?? 'FIORENZO' }}
                                </p>
                                <h3 class="text-[16px] font-light tracking-wide group-hover:italic transition-all duration-300"
                                    style="font-family: 'Cormorant Garamond', serif;">
                                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="text-[13px] tracking-widest text-[#8b0000] mt-2 italic font-medium">LKR
                                    {{ number_format($product->price, 0) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-20 flex justify-center opacity-0 transform translate-y-4 transition-all duration-700 delay-1000"
                    :class="shown ? 'opacity-100 translate-y-0' : ''">
                    <a href="{{ route('shop.men') }}"
                        class="px-12 py-4 border border-black/10 text-[10px] tracking-[0.4em] font-medium hover:bg-black hover:text-white transition-all duration-500 uppercase">
                        View More Men's
                    </a>
                    <a href="{{ route('shop.women') }}"
                        class="ml-4 px-12 py-4 border border-black/10 text-[10px] tracking-[0.4em] font-medium hover:bg-black hover:text-white transition-all duration-500 uppercase">
                        View More Women's
                    </a>
                </div>
            </div>
        </section>

        <!-- Brand Story (Replaced with Curated Grid Design) -->
        <section
            class="w-full bg-white py-32 md:py-48 lg:py-64 selection:bg-black selection:text-white font-['Cormorant_Garamond']"
            x-data="{ shown: false }" x-intersect.once="shown = true"
            style="padding-top: 100px; padding-bottom: 100px;">
            <div class="max-w-[1400px] mx-auto px-6 lg:px-12">

                <h2 class="text-center text-5xl md:text-6xl font-light tracking-[0.35em]
         mb-16 md:mb-24 uppercase text-gray-900
         opacity-0 transform translate-y-5
         transition-all duration-1000 ease-[cubic-bezier(0.215,0.61,0.355,1)]"
                    :class="shown ? 'opacity-100 translate-y-0' : ''" style="font-family: 'Crimson Text', serif;">
                    Our World
                </h2>


                <div class="flex flex-col md:flex-row items-center justify-center gap-12 md:gap-16 lg:gap-8">
                    @php
                        $brandStories = [
                            [
                                'title' => "Shoes",
                                'image' => 'images/OTHER/HERO_IMAGE_1.png',
                                'size' => 'large', // Kept for structure but overridden by CSS below
                                'delay' => '0ms'
                            ],
                            [
                                'title' => "Bags",
                                'image' => 'images/OTHER/HERO_IMAGE_2.png',
                                'size' => 'large',
                                'delay' => '150ms'
                            ],
                            [
                                'title' => "Accessories",
                                'image' => 'images/OTHER/HERO_IMAGE_4.png',
                                'size' => 'large',
                                'delay' => '300ms'
                            ]
                        ];
                    @endphp

                    @foreach($brandStories as $story)
                        <div class="flex flex-col items-center group cursor-pointer w-full md:w-1/3 opacity-0 transform translate-y-8 transition-all duration-1000 ease-[cubic-bezier(0.215,0.61,0.355,1)]"
                            :class="shown ? 'opacity-100 translate-y-0' : ''"
                            style="transition-delay: {{ $story['delay'] }}">

                            <div
                                class="relative overflow-hidden w-full bg-gray-50 transition-all duration-700 ease-in-out aspect-[3/4]">
                                <img src="{{ asset($story['image']) }}" alt="{{ $story['title'] }}"
                                    class="w-full h-full object-cover transition-transform duration-1000 ease-out group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-500">
                                </div>
                            </div>

                            <div class="mt-8 text-center">
                                <p class="uppercase tracking-[0.05em] text-black text-3xl md:text-4xl font-normal mt-4 md:mt-12 group-hover:opacity-80 transition-opacity duration-300"
                                    style="font-family: 'Cormorant Garamond', serif;">
                                    {{ $story['title'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- Full-width Split Section (add space above & below) -->
        <section class="my-64 flex flex-col lg:flex-row h-screen lg:h-[80vh]"
            style="margin-top: 100px; margin-bottom: 100px;">
            <!-- Women -->
            <div class="relative flex-1 group overflow-hidden h-1/2 lg:h-full">
                <video src="{{ asset('videos/women_subhero.mp4') }}" autoplay muted loop playsinline
                    class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105"></video>
                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-white p-6">
                    <h3 class="text-3xl lg:text-4xl font-light tracking-[0.4em] mb-14 uppercase"
                        style="font-family: 'Cormorant Garamond', serif;">
                        Women's Collection
                    </h3>
                    <a href="{{ route('shop.women') }}"
                        class="px-8 py-3 border border-white text-[10px] tracking-[0.3em] hover:bg-white hover:text-black transition-all duration-300 uppercase">
                        EXPLORE
                    </a>
                </div>
            </div>

            <!-- Men -->
            <div class="relative flex-1 group overflow-hidden h-1/2 lg:h-full">
                <video src="{{ asset('videos/men_subhero.mp4') }}" autoplay muted loop playsinline
                    class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105"></video>
                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-white p-6">
                    <h3 class="text-3xl lg:text-4xl font-light tracking-[0.4em] mb-14 uppercase"
                        style="font-family: 'Cormorant Garamond', serif;">
                        Men's Collection
                    </h3>
                    <a href="{{ route('shop.men') }}"
                        class="px-8 py-3 border border-white text-[10px] tracking-[0.3em] hover:bg-white hover:text-black transition-all duration-300 uppercase">
                        EXPLORE
                    </a>
                </div>
            </div>
        </section>


        <!-- Featured Article Section (The Season of Love) -->
        <section
            class="w-full bg-white flex flex-col items-center justify-center pt-0 pb-24 lg:pt-24 lg:pb-32 px-6 sm:px-10 overflow-hidden"
            x-data="{ hovered: false, shown: false }" x-intersect.once="shown = true">

            <div class="max-w-[1440px] w-full flex flex-col items-center">



                <!-- Article Content Grid -->
                <div class="flex flex-col lg:flex-row items-center justify-center gap-20 lg:gap-40 w-full">

                    <!-- Image Container (SMALLER) -->
                    <div class="w-full lg:w-[38%] max-w-[520px] overflow-hidden">
                        <div class="relative aspect-[3/4] cursor-pointer group" @mouseenter="hovered = true"
                            @mouseleave="hovered = false">

                            <img src="{{ asset('images/OTHER/heroside.png') }}" alt="The Season of Love Campaign" class="absolute inset-0 w-full h-full object-cover
                               transition-transform duration-[1200ms]
                               ease-[cubic-bezier(0.5,0,0,1)]" :class="hovered ? 'scale-105' : 'scale-100'">
                        </div>
                    </div>

                    <!-- Text Content (BIGGER TYPE) -->
                    <div class="w-full lg:w-[40%] max-w-[300px]
                        flex flex-col justify-center text-center lg:text-left">

                        <!-- Title -->
                        <!-- Title -->
                        <!-- Title -->
                        <!-- Title -->
                        <h2 class="text-3xl md:text-4xl font-normal tracking-[0.05em] uppercase text-black mb-6 opacity-0 transform translate-y-5 transition-all duration-1000 delay-100"
                            :class="shown ? 'opacity-100 translate-y-0' : ''"
                            style="font-family: 'Cormorant Garamond', serif;">
                            The Season of Love
                        </h2>


                        <!-- Description -->
                        <!-- Description -->
                        <!-- Description -->
                        <!-- Description -->
                        <p class="text-sm md:text-base font-light leading-relaxed text-black opacity-0 transform translate-y-5 transition-all duration-1000 delay-200"
                            :class="shown ? 'opacity-100 translate-y-0' : ''"
                            style="font-family: 'Cormorant Garamond', serif;">
                            FIORENZO turns the dating ritual inward in a new campaign that reframes love as a
                            relationship with oneself. Through intimate silhouettes and quiet moments, the House
                            explores self-connection as the most enduring form of romance, where confidence,
                            individuality, and presence become expressions of modern luxury.
                        </p>


                    </div>
                </div>
            </div>
        </section>




</x-app-layout>