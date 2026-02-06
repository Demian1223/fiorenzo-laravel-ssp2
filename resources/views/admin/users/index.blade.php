1<x-app-layout>
    <x-admin-hero title="Users Management" image="Manage_Accounts.jpg" />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8 text-right">
        <a href="{{ route('admin.users.create') }}"
            class="inline-flex items-center px-6 py-3 bg-[#8b0000] border border-transparent rounded-none font-['Cormorant_Garamond'] font-semibold text-lg text-white uppercase tracking-widest hover:bg-[#600000] active:bg-[#400000] focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md">
            + Add New User
        </a>
    </div>

    <div class="py-12 bg-[#fafafa]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-stone-200 shadow-sm overflow-hidden">
                <div class="p-8 text-gray-900">

                    <div class="overflow-x-auto">
                        <table class="w-full text-left font-['Cormorant_Garamond']">
                            <thead>
                                <tr class="border-b border-stone-300">
                                    <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">ID
                                    </th>
                                    <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                        Registered</th>
                                    <th
                                        class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider text-right">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="font-sans text-sm">
                                @foreach($users as $user)
                                    <tr
                                        class="group hover:bg-stone-50 transition-colors border-b border-stone-100 last:border-0">
                                        <td class="py-4 text-gray-500">#{{ $user->id }}</td>
                                        <td class="py-4 font-medium text-gray-800">{{ $user->name }}</td>
                                        <td class="py-4 text-gray-600">{{ $user->email }}</td>
                                        <td class="py-4">
                                            <span
                                                class="px-3 py-1 text-xs uppercase tracking-widest border {{ $user->role === 'admin' ? 'border-[#8b0000] text-[#8b0000]' : 'border-gray-300 text-gray-600' }}">
                                                {{ $user->role }}
                                            </span>
                                        </td>
                                        <td class="py-4 text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                                        <td class="py-4 text-right">
                                            <div class="flex items-center justify-end space-x-2">
                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                    class="text-gray-600 hover:text-[#8b0000] transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </a>

                                                @if($user->id !== auth()->id())
                                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-gray-400 hover:text-red-600 transition-colors">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>