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


    @livewireStyles

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
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('components.footer')

    @stack('modals')
    @livewireScripts
</body>

</html>