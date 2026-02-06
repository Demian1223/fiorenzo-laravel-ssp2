<header 
    x-data="{ 
        isScrolled: false,
        init() {
            this.handleScroll();
        },
        handleScroll() {
            this.isScrolled = window.scrollY > 20;
        }
    }" 
    @scroll.window="handleScroll()"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] w-full border-b"
    :class="isScrolled ? 'bg-white text-black border-neutral-100 shadow-sm py-2' : 'bg-transparent text-white border-transparent py-6'">
    
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        
        <!-- Top Row: Logo & Icons (Absolute Centering) -->
        <div class="relative flex justify-between items-center w-full mb-8 min-h-[48px]">
            
            <!-- Left: Search -->
            <div class="flex items-center z-10">
               <div class="hidden md:block">
                   <livewire:navbar-search />
               </div>
            </div>

            <!-- Center: Logo -->
            <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-center w-full pointer-events-none">
                <a href="{{ route('home') }}" 
                   class="inline-block pointer-events-auto transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] font-light whitespace-nowrap"
                   :class="isScrolled ? 'text-3xl' : 'text-5xl lg:text-7xl'"
                   aria-label="Fiorenzo - Home"
                   style="font-family: 'Cormorant Garamond', serif; letter-spacing: 0.05em;">
                    FIORENZO
                </a>
            </div>

            <!-- Right: Icons -->
            <div class="flex items-center gap-6 z-10">
                 <!-- Account -->
                @auth
                    <a href="{{ route('dashboard') }}" class="p-1 hover:opacity-60 transition-opacity duration-300" aria-label="Dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </a>
                    
                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="p-1 hover:opacity-60 transition-opacity duration-300" aria-label="Log Out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="p-1 hover:opacity-60 transition-opacity duration-300" aria-label="Login">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </a>
                @endauth
                
                <!-- Cart -->
                <livewire:cart-icon />
            </div>
        </div>

        <!-- Bottom Row: Navigation Links -->
        <nav class="flex justify-center items-center w-full transition-opacity duration-500" :class="isScrolled ? 'opacity-100' : 'opacity-90'">
            <ul class="flex flex-wrap justify-center items-center gap-8 md:gap-12 w-full">
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <!-- Admin Menu -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap {{ request()->routeIs('admin.dashboard') ? 'text-[#8b0000]' : '' }}"
                           style="font-family: 'Cormorant Garamond', serif;">
                            Admin Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" 
                           class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap {{ request()->routeIs('admin.users.*') ? 'text-[#8b0000]' : '' }}"
                           style="font-family: 'Cormorant Garamond', serif;">
                            Manage Accounts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" 
                           class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap {{ request()->routeIs('admin.products.*') ? 'text-[#8b0000]' : '' }}"
                           style="font-family: 'Cormorant Garamond', serif;">
                            Manage Inventory
                        </a>
                    </li>
                @else
                    <!-- Public Menu -->
                    <li>
                        <a href="{{ route('home') }}" 
                           class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap"
                           style="font-family: 'Cormorant Garamond', serif;">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" 
                           class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap"
                           style="font-family: 'Cormorant Garamond', serif;">
                            Our Story
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.men') }}" 
                           class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap"
                           style="font-family: 'Cormorant Garamond', serif;">
                            Men
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.women') }}" 
                           class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap"
                           style="font-family: 'Cormorant Garamond', serif;">
                            Women
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ethics') }}" 
                           class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap"
                           style="font-family: 'Cormorant Garamond', serif;">
                            Ethics
                        </a>
                    </li>
                     <li>
                        <a href="{{ route('services') }}" 
                           class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap"
                           style="font-family: 'Cormorant Garamond', serif;">
                            Our Services
                        </a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('orders.index') }}" 
                               class="text-[13px] uppercase tracking-[0.25em] font-medium hover:text-gray-500 transition-colors duration-300 whitespace-nowrap {{ request()->routeIs('orders.*') ? 'text-[#8b0000]' : '' }}"
                               style="font-family: 'Cormorant Garamond', serif;">
                                My Orders
                            </a>
                        </li>
                    @endauth
                @endif
            </ul>
        </nav>
        
    </div>
</header>