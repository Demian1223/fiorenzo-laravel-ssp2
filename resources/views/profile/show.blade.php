<x-app-layout>
    <!-- Hero Section -->
    <div class="relative w-full">
        <img src="{{ asset('images/OTHER/My_Account.jpg') }}" alt="My Account" class="w-full h-auto">
        <!-- Dark Overlay -->
        <div class="absolute inset-0 z-10" style="background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4 z-20">
            <h1
                class="text-white text-4xl md:text-5xl lg:text-6xl font-light tracking-[0.2em] uppercase font-['Cormorant_Garamond'] text-center">
                Profile & Settings
            </h1>
        </div>
    </div>

    <div class="font-['Cormorant_Garamond'] text-[1.3rem]">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>