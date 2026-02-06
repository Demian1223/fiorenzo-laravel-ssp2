<x-app-layout>
    <x-admin-hero title="Edit User" image="Manage_Accounts.jpg" />

    <x-slot name="header">
        <div class="flex justify-between items-center bg-[#fafafa] py-4 px-8">
            <h2 class="font-['Cormorant_Garamond'] font-semibold text-3xl text-gray-800 leading-tight">
                {{ __('Edit: ') . $user->name }}
            </h2>
            <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:text-gray-900 font-['Cormorant_Garamond'] text-lg">
                &larr; Back to Users
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#fafafa]">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-stone-200 shadow-sm overflow-hidden p-8">
                
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-['Cormorant_Garamond']">
                        
                        <!-- Details -->
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-xl text-gray-700">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans" required>
                                @error('name') <span class="text-red-600 text-sm font-sans">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-xl text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans" required>
                                @error('email') <span class="text-red-600 text-sm font-sans">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Security -->
                         <div class="space-y-6">
                            <div>
                                <label for="role" class="block text-xl text-gray-700">Role</label>
                                <select name="role" id="role" class="mt-2 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans" required>
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role') <span class="text-red-600 text-sm font-sans">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="p-4 bg-stone-50 border border-stone-200 mt-4">
                                <h3 class="font-bold text-gray-700 mb-2">Change Password</h3>
                                <p class="text-sm text-gray-500 mb-4 font-sans">Leave blank to keep current password.</p>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label for="password" class="block text-lg text-gray-600">New Password</label>
                                        <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans">
                                        @error('password') <span class="text-red-600 text-sm font-sans">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class="block text-lg text-gray-600">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-gray-300 focus:border-[#8b0000] focus:ring-[#8b0000] shadow-sm font-sans">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="inline-flex items-center px-8 py-3 bg-[#8b0000] border border-transparent rounded-none font-['Cormorant_Garamond'] font-semibold text-xl text-white uppercase tracking-widest hover:bg-[#600000] active:bg-[#400000] focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Update User
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
