<x-app-layout>
    <!-- Hero Section -->
    <div class="relative w-full">
        <img src="{{ asset('images/OTHER/My_Account.jpg') }}" alt="My Account" class="w-full h-auto">
        <!-- Dark Overlay -->
        <div class="absolute inset-0 z-10" style="background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4 z-20">
            <h1
                class="text-white text-4xl md:text-5xl lg:text-6xl font-light tracking-[0.2em] uppercase font-['Cormorant_Garamond'] text-center">
                My Account
            </h1>
        </div>
    </div>

    <div class="py-12 font-['Cormorant_Garamond']">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4 text-lg tracking-wide">{{ __("Welcome back.") }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

                        <div class="border p-6">
                            <h2 class="text-xl uppercase tracking-widest mb-4">Profile & Settings</h2>
                            <a href="{{ route('profile.show') }}" class="underline hover:text-gray-600">Manage
                                account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>