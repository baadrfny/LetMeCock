<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 relative">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-amber/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-surface shadow-[0_20px_60px_rgba(0,0,0,0.5)] sm:rounded-3xl border border-white/10">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-surface shadow-[0_20px_60px_rgba(0,0,0,0.5)] sm:rounded-3xl border border-white/10">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-surface shadow-[0_20px_60px_rgba(0,0,0,0.5)] sm:rounded-3xl border border-white/10">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
