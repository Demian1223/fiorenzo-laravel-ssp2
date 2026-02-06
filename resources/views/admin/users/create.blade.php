<x-app-layout>
    <x-admin-hero title="Add New User" image="Manage_Accounts.jpg" />

    <x-slot name="header">
        <div class="flex justify-between items-center bg-[#fafafa] py-4 px-8">
            <h2 class="font-['Cormorant_Garamond'] font-semibold text-3xl text-gray-800 leading-tight">
                {{ __('Create User') }}
            </h2>
            <a href="{{ route('admin.users.index') }}"
                class="text-gray-600 hover:text-gray-900 font-['Cormorant_Garamond'] text-lg">
                &larr; Back to Users
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#fafafa]">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-stone-200 shadow-sm overflow-hidden p-8">

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="space-y-6 font-['Cormorant_Garamond']">
                        <div>
                            <label for="name" class="block text-xl text-gray-700">Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans"
                                required>
                            @error('name') <span class="text-red-600 text-sm font-sans">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-xl text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans"
                                required>
                            @error('email') <span class="text-red-600 text-sm font-sans">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-xl text-gray-700">Password</label>
                            <input type="password" name="password" id="password"
                                class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans"
                                required>
                            @error('password') <span class="text-red-600 text-sm font-sans">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-xl text-gray-700">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans"
                                required>
                        </div>

                        <div>
                            <label for="role" class="block text-xl text-gray-700">Role</label>
                            <select name="role" id="role"
                                class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans"
                                required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('role') <span class="text-red-600 text-sm font-sans">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-8 py-3 bg-[#8b0000] border border-transparent rounded-none font-['Cormorant_Garamond'] font-semibold text-xl text-white uppercase tracking-widest hover:bg-[#600000] active:bg-[#400000] focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Create User
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>