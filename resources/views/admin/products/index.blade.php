<x-app-layout>
    <x-admin-hero title="Products Management" image="Manage_Inventory.jpg" />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8 text-right">
        <a href="{{ route('admin.products.create') }}"
            class="inline-flex items-center px-6 py-3 bg-[#8b0000] border border-transparent rounded-none font-['Cormorant_Garamond'] font-semibold text-lg text-white uppercase tracking-widest hover:bg-[#600000] active:bg-[#400000] focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md">
            + Add New Product
        </a>
    </div>

    <div class="py-12 bg-[#fafafa]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-8 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold font-['Cormorant_Garamond']">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white border border-stone-200 shadow-sm overflow-hidden">
                <div class="p-8 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left font-['Cormorant_Garamond']">
                            <thead>
                                <tr class="border-b border-stone-300">
                                    <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider w-24">
                                        Image</th>
                                    <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                        Category</th>
                                    <th
                                        class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider text-right">
                                        Price</th>
                                    <th
                                        class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider text-right">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="font-sans text-sm">
                                @foreach($products as $product)
                                    <tr
                                        class="group hover:bg-stone-50 transition-colors border-b border-stone-100 last:border-0">
                                        <td class="py-4">
                                            <div class="h-16 w-16 bg-gray-100 overflow-hidden border border-gray-200">
                                                <img src="{{ \Illuminate\Support\Str::startsWith($product->image_url, 'http') ? $product->image_url : asset($product->image_url) }}"
                                                    alt="{{ $product->name }}" class="h-full w-full object-cover">
                                            </div>
                                        </td>
                                        <td class="py-4 font-medium text-lg font-['Cormorant_Garamond'] text-gray-800">
                                            {{ $product->name }}
                                        </td>
                                        <td class="py-4 text-gray-600">{{ $product->category?->name ?? 'N/A' }}</td>

                                        <td class="py-4 text-right font-medium text-gray-800">
                                            £{{ number_format((float) $product->price, 2) }}</td>

                                        <td class="py-4 text-right space-x-2">
                                            <a href="{{ route('admin.products.edit', $product) }}"
                                                class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 font-medium ml-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>