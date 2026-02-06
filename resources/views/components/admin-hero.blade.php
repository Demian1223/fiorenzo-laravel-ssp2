@props(['title' => 'Dashboard', 'image' => 'ADMIN.jpg'])

<div class="relative w-full">
    <img src="{{ asset('images/OTHER/' . $image) }}" alt="Admin {{ $title }}" class="w-full h-auto grayscale-[50%]">

    <!-- Dark Overlay -->
    <div class="absolute inset-0 z-10" style="background-color: rgba(40, 0, 0, 0.6);"></div>

    <div class="absolute inset-0 flex flex-col items-center justify-center p-4 z-20">
        <p
            class="text-white text-sm md:text-base uppercase tracking-[0.3em] mb-4 opacity-90 font-['Cormorant_Garamond']">
            Administration</p>
        <h1
            class="text-white text-4xl md:text-6xl lg:text-7xl font-light tracking-[0.2em] uppercase font-['Cormorant_Garamond'] text-center">
            {{ $title }}
        </h1>
    </div>
</div>