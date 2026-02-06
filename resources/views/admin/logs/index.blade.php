<x-app-layout>
        <x-admin-hero title="Login Activity Logs" image="Activity_Logs.jpg" />

        <x-slot name="header">
            <h2
                class="font-['Cormorant_Garamond'] font-semibold text-3xl text-gray-800 leading-tight bg-[#fafafa] py-4 px-8">
                {{ __('Activity History') }}
            </h2>
        </x-slot>

        <div class="py-12 bg-[#fafafa]">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white border border-stone-200 shadow-sm overflow-hidden">
                    <div class="p-8 text-gray-900">

                        <div class="overflow-x-auto">
                            <table class="w-full text-left font-['Cormorant_Garamond']">
                                <thead>
                                    <tr class="border-b border-stone-300">
                                        <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                            User
                                        </th>
                                        <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                            Role
                                        </th>
                                        <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">IP
                                            Address</th>
                                        <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                            Time
                                        </th>
                                        <th class="pb-4 text-xl font-normal text-[#8b0000] uppercase tracking-wider">
                                            Browser
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="font-sans text-sm">
                                    @foreach($logs as $log)
                                        <tr
                                            class="group hover:bg-stone-50 transition-colors border-b border-stone-100 last:border-0">
                                            <td class="py-4 font-medium text-gray-800">{{ $log->user->name ?? 'Unknown' }}
                                                <span class="text-xs text-gray-500">({{ $log->user->email ?? '' }})</span>
                                            </td>
                                            <td class="py-4">
                                                <span
                                                    class="px-2 py-1 text-xs uppercase tracking-widest border {{ ($log->user->role ?? '') === 'admin' ? 'border-[#8b0000] text-[#8b0000]' : 'border-gray-300 text-gray-600' }}">
                                                    {{ $log->user->role ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="py-4 text-gray-600">{{ $log->ip_address }}</td>
                                            <td class="py-4 text-gray-800">{{ $log->logged_in_at->format('M d, Y H:i:s') }}
                                            </td>
                                            <td class="py-4 text-gray-500 text-xs truncate max-w-xs"
                                                title="{{ $log->user_agent }}">{{ $log->user_agent }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-8">
                            {{ $logs->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>