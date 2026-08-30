<x-guest-layout>
    <div class="text-center mb-6 space-y-2">
        <div class="inline-block px-4 py-1.5 rounded-full bg-white/5 border border-white/10">
            <span class="text-[9px] font-bold uppercase tracking-[0.4em] text-amber">Join the Kitchen</span>
        </div>
        <h1 class="text-3xl font-bold tracking-tight text-white">
            Create your <span class="text-amber">Account</span>
        </h1>
        <p class="text-silver text-sm font-medium">Your pantry of recipes is waiting.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div class="group space-y-2">
            <label class="text-[9px] font-bold uppercase tracking-[0.3em] text-silver ml-2 group-focus-within:text-amber transition-colors">Name</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus
                class="w-full bg-black/30 border-white/10 rounded-2xl py-3.5 px-6 text-white focus:border-amber/50 focus:ring-0 transition-all duration-300 ease-in-out font-bold text-sm shadow-inner placeholder-silver-muted"
                placeholder="Ex: Leonardo da Chef">
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500 text-[9px] font-bold uppercase" />
        </div>

        <div class="group space-y-2">
            <label class="text-[9px] font-bold uppercase tracking-[0.3em] text-silver ml-2 group-focus-within:text-amber transition-colors">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required
                class="w-full bg-black/30 border-white/10 rounded-2xl py-3.5 px-6 text-white focus:border-amber/50 focus:ring-0 transition-all duration-300 ease-in-out font-bold text-sm shadow-inner placeholder-silver-muted"
                placeholder="name@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-[9px] font-bold uppercase" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="group space-y-2">
                <label class="text-[9px] font-bold uppercase tracking-[0.3em] text-silver ml-2 group-focus-within:text-amber transition-colors">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full bg-black/30 border-white/10 rounded-xl py-3.5 px-6 text-white focus:border-amber/50 focus:ring-0 transition-all duration-300 ease-in-out font-bold text-sm shadow-inner"
                    placeholder="••••••••">
            </div>

            <div class="group space-y-2">
                <label class="text-[9px] font-bold uppercase tracking-[0.3em] text-silver ml-2 group-focus-within:text-amber transition-colors">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full bg-black/30 border-white/10 rounded-xl py-3.5 px-6 text-white focus:border-amber/50 focus:ring-0 transition-all duration-300 ease-in-out font-bold text-sm shadow-inner"
                    placeholder="••••••••">
            </div>
        </div>
        <x-input-error :messages="$errors->get('password')" class="text-red-500 text-[9px] font-bold uppercase" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="text-red-500 text-[9px] font-bold uppercase" />

        <div class="pt-2 space-y-4">
            <button type="submit" class="w-full group relative py-5 bg-amber hover:bg-amber-soft text-black font-bold text-[10px] uppercase tracking-[0.3em] rounded-2xl transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)] overflow-hidden">
                <span class="relative z-10">Create Account</span>
                <div class="absolute inset-0 bg-gradient-to-r from-amber to-amber-soft opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </button>

            <div class="text-center">
                <a class="text-[9px] font-bold uppercase tracking-widest text-silver-muted hover:text-amber transition-colors" href="{{ route('login') }}">
                    {{ __('Already have an account? Login') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
