<x-guest-layout>
    <div class="text-center mb-6 space-y-3">
        <div class="inline-block px-4 py-1.5 rounded-full bg-white/5 border border-white/10">
            <span class="text-[9px] font-bold uppercase tracking-[0.4em] text-amber">Welcome Back</span>
        </div>
        <h1 class="text-3xl font-bold tracking-tight text-white">
            Sign <span class="text-amber">In</span>
        </h1>
        <p class="text-silver text-sm font-medium">Ready to whip up something delicious?</p>
    </div>

    <x-auth-session-status class="mb-6 text-amber text-[10px] font-bold text-center uppercase tracking-widest" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div class="group space-y-2">
            <label class="text-[9px] font-bold uppercase tracking-[0.3em] text-silver ml-2 group-focus-within:text-amber transition-colors">
                {{ __('Email') }}
            </label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                class="w-full bg-black/30 border-white/10 rounded-2xl py-4 px-6 text-white focus:border-amber/50 focus:ring-0 transition-all duration-300 ease-in-out font-bold text-sm placeholder-silver-muted shadow-inner"
                placeholder="name@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-[9px] font-bold uppercase" />
        </div>

        <div class="group space-y-2">
            <div class="flex justify-between items-center px-2">
                <label class="text-[9px] font-bold uppercase tracking-[0.3em] text-silver group-focus-within:text-amber transition-colors">
                    {{ __('Password') }}
                </label>
            </div>
            <input id="password" type="password" name="password" required
                class="w-full bg-black/30 border-white/10 rounded-2xl py-4 px-6 text-white focus:border-amber/50 focus:ring-0 transition-all duration-300 ease-in-out font-bold text-sm placeholder-silver-muted shadow-inner"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-[9px] font-bold uppercase" />
        </div>

        <div class="flex items-center justify-between px-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-white/20 bg-black/30 text-amber focus:ring-amber focus:ring-offset-background">
                <span class="ms-3 text-[9px] font-bold uppercase tracking-widest text-silver group-hover:text-white transition-colors">Remember</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-[9px] font-bold uppercase tracking-widest text-amber hover:text-amber-soft transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot?') }}
                </a>
            @endif
        </div>

        <button type="submit" class="w-full group relative py-5 bg-amber hover:bg-amber-soft text-black font-bold text-[10px] uppercase tracking-[0.3em] rounded-2xl transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)] overflow-hidden">
            <span class="relative z-10">{{ __('Login') }}</span>
            <div class="absolute inset-0 bg-gradient-to-r from-amber to-amber-soft opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </button>
    </form>

    <div class="mt-8 text-center">
        <p class="text-silver-muted text-[9px] font-bold uppercase tracking-[0.3em]">
            New here? <a href="{{ route('register') }}" class="text-amber hover:text-amber-soft transition-colors underline decoration-amber/30 underline-offset-4">Create your kitchen</a>
        </p>
    </div>
</x-guest-layout>
