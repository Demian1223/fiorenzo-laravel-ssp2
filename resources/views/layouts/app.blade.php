<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fiorenzo') }} - Luxury Fashion</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        [x-cloak] {
            display: none !important;
        }

        .font-serif {
            font-family: 'Cormorant Garamond', serif;
        }

        .font-sans {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="font-sans text-[#1b1b1b] antialiased bg-white selection:bg-[#8b0000] selection:text-white" x-data="{ 
          mobileMenuOpen: false, 
          scrolled: false 
      }" @scroll.window="scrolled = (window.pageYOffset > 20)">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main>
        <!-- Flash Messages -->
        @if (session('error'))
            <div class="fixed top-24 left-1/2 -translate-x-1/2 z-[60] w-full max-w-md px-4">
                <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-none shadow-xl flex justify-between items-center animate-fade-in-down"
                    role="alert">
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                    <button type="button" onclick="this.parentElement.parentElement.remove()"
                        class="text-red-900/50 hover:text-red-900">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="fixed top-24 left-1/2 -translate-x-1/2 z-[60] w-full max-w-md px-4">
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-none shadow-xl flex justify-between items-center animate-fade-in-down"
                    role="alert">
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                    <button type="button" onclick="this.parentElement.parentElement.remove()"
                        class="text-green-900/50 hover:text-green-900">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('components.footer')

    @stack('modals')
</body>

</html>