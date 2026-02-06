<x-app-layout>
    <!-- Admin Hero Section -->
    <!-- Admin Hero Section -->
    <x-admin-hero title="Dashboard" />

    <div class="font-['Cormorant_Garamond'] py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Navigation Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4">

                <!-- Users Card -->
                <a href="{{ route('admin.users.index') }}" class="group block">
                    <div
                        class="bg-white border border-stone-200 p-10 text-center transition-all duration-500 hover:shadow-xl hover:border-[#8b0000]">
                        <div
                            class="text-[#8b0000] text-4xl mb-4 group-hover:scale-110 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.38 9.38 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </div>
                        <h3
                            class="text-2xl uppercase tracking-widest text-gray-900 group-hover:text-[#8b0000] transition-colors">
                            Users</h3>
                        <p class="text-gray-500 mt-2 font-sans text-xs tracking-wider uppercase">Manage Accounts</p>
                    </div>
                </a>

                <!-- Products Card -->
                <a href="{{ route('admin.products.index') }}" class="group block">
                    <div
                        class="bg-white border border-stone-200 p-10 text-center transition-all duration-500 hover:shadow-xl hover:border-[#8b0000]">
                        <div
                            class="text-[#8b0000] text-4xl mb-4 group-hover:scale-110 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                        <h3
                            class="text-2xl uppercase tracking-widest text-gray-900 group-hover:text-[#8b0000] transition-colors">
                            Products</h3>
                        <p class="text-gray-500 mt-2 font-sans text-xs tracking-wider uppercase">Manage Inventory</p>
                    </div>
                </a>

                <!-- Logs Card -->
                <a href="{{ route('admin.logs.index') }}" class="group block">
                    <div
                        class="bg-white border border-stone-200 p-10 text-center transition-all duration-500 hover:shadow-xl hover:border-[#8b0000]">
                        <div
                            class="text-[#8b0000] text-4xl mb-4 group-hover:scale-110 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <h3
                            class="text-2xl uppercase tracking-widest text-gray-900 group-hover:text-[#8b0000] transition-colors">
                            Activity Logs</h3>
                        <p class="text-gray-500 mt-2 font-sans text-xs tracking-wider uppercase">Monitor Logins</p>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>