<nav class="glass-header" data-mobile-menu>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            <!-- Brand: left -->
            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-xl font-bold tracking-tight text-white">
                    <span class="w-8 h-8 rounded-lg bg-amber flex items-center justify-center text-black">
                        <i class="fas fa-utensils text-sm"></i>
                    </span>
                    LetMe<span class="text-amber">Cook</span>
                </a>
            </div>

            <!-- Primary links: centered -->
            <div class="hidden sm:flex absolute left-1/2 -translate-x-1/2 items-center space-x-8">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                @auth
                    @if(auth()->user()->role === 'user')
                        <x-nav-link :href="route('favorites.index')" :active="request()->routeIs('favorites.index')">
                            {{ __('Favorites') }}
                        </x-nav-link>
                        <x-nav-link :href="route('client.ai.index')" :active="request()->routeIs('client.ai.index')">
                            {{ __('Recipe suggestion') }}
                        </x-nav-link>
                    @endif
                    @if(auth()->user()->role === 'admin')
                        <x-nav-link :href="route('recipes.index')" :active="request()->routeIs('recipes.index')">
                            {{ __('My Recipes') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Admin') }}
                        </x-nav-link>
                    @endif
                @endauth
            </div>

            <!-- Actions: right -->
            <div class="flex items-center shrink-0">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-2 border border-white/10 rounded-xl text-sm font-medium text-silver bg-white/5 hover:text-white hover:border-amber/40 focus:outline-none transition duration-300 ease-in-out">
                            <i class="fas fa-user-circle text-amber"></i>
                            <span class="max-w-[10rem] truncate">{{ Auth::user()->name }}</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="text-amber-soft hover:bg-white/5"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
                @else
                <div class="hidden sm:flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-xl text-sm font-medium text-silver hover:text-white transition-colors">
                        {{ __('Login') }}
                    </a>
                    <a href="{{ route('register') }}" class="bg-amber hover:bg-amber-soft text-black font-bold px-5 py-2.5 rounded-xl text-sm transition-colors shadow-[0_8px_24px_rgba(255,107,0,0.35)]">
                        {{ __('Register') }}
                    </a>
                </div>
                @endauth

                <!-- Mobile toggle -->
                <div class="-me-2 flex items-center sm:hidden ms-3">
                    <button data-mobile-menu-trigger class="inline-flex items-center justify-center p-2 rounded-md text-silver hover:text-white hover:bg-white/5 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path data-mobile-menu-icon class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path data-mobile-menu-close class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
