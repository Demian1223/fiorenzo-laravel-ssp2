<x-app-layout>
    <x-admin-hero title="Add New Product" image="Manage_Inventory.jpg" />

    <x-slot name="header">
        <div class="flex justify-between items-center bg-[#fafafa] py-4 px-8">
            <h2 class="font-['Cormorant_Garamond'] font-semibold text-3xl text-gray-800 leading-tight">
                {{ __('Create Product') }}
            </h2>
            <a href="{{ route('admin.products.index') }}"
                class="text-gray-600 hover:text-gray-900 font-['Cormorant_Garamond'] text-lg">
                &larr; Back to Products
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#fafafa]">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-stone-200 shadow-sm overflow-hidden p-8">

                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf

                    <!-- Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-['Cormorant_Garamond']">

                        <!-- Col 1 -->
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-xl text-gray-700">Product Name</label>
                                <input type="text" name="name" id="name"
                                    class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans"
                                    required>
                                @error('name') <span class="text-red-600 text-sm font-sans">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="price" class="block text-xl text-gray-700">Price (£)</label>
                                <input type="number" step="0.01" name="price" id="price"
                                    class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans"
                                    required>
                                @error('price') <span class="text-red-600 text-sm font-sans">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Stock Removed -->
                        </div>

                        <!-- Col 2 -->
                        <div class="space-y-6">
                            <div>
                                <label for="category_id" class="block text-xl text-gray-700">Category</label>
                                <select name="category_id" id="category_id"
                                    class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans"
                                    required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-red-600 text-sm font-sans">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Brand Removed -->

                            <div>
                                <label for="image_url" class="block text-xl text-gray-700">Image URL</label>
                                <input type="text" name="image_url" id="image_url"
                                    placeholder="https://example.com/image.jpg"
                                    class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans">
                                <p class="text-sm text-gray-500 mt-1 font-sans">Enter absolute URL or path relative to
                                    public/.</p>
                                @error('image_url') <span class="text-red-600 text-sm font-sans">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Description -->
                    <div class="mt-8 font-['Cormorant_Garamond']">
                        <label for="description" class="block text-xl text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans"></textarea>
                        @error('description') <span class="text-red-600 text-sm font-sans">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-8 py-3 bg-[#8b0000] border border-transparent rounded-none font-['Cormorant_Garamond'] font-semibold text-xl text-white uppercase tracking-widest hover:bg-[#600000] active:bg-[#400000] focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Create Product
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>