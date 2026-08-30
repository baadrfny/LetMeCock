<x-app-layout>
    <x-slot name="header">
        <span class="text-amber font-black tracking-widest uppercase text-xs">Collection</span>
        <h2 class="font-bold text-2xl text-white leading-tight">
            {{ __('My Favorites') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-amber/10 rounded-full blur-[120px] -z-10"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">

            <div class="mb-12 animate-fade-up">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 tracking-tight">
                    Saved <span class="text-amber">Flavors</span>
                </h1>
                <p class="text-silver text-lg font-medium">Your personal collection of culinary inspiration.</p>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-2xl flex items-center gap-3">
                    <i class="fas fa-check-circle"></i>
                    <span class="text-sm font-bold">{{ session('success') }}</span>
                </div>
            @endif

            @auth
                @if(auth()->user()->favorites->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach(auth()->user()->favorites as $favorite)
                            <div class="group relative bg-surface border border-white/10 rounded-[2rem] overflow-hidden hover:border-orange-500/30 hover:shadow-lg hover:shadow-orange-500/5 transition-all duration-300 ease-in-out">

                                <div class="relative h-64 overflow-hidden">
                                    @if($favorite->recipe->image)
                                        <img src="{{ $favorite->recipe->image_url ?: 'https://via.placeholder.com/600x800' }}"
                                             alt="{{ $favorite->recipe->name }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <div class="w-full h-full bg-black/30 flex items-center justify-center">
                                            <i class="fas fa-utensils text-4xl text-white/10"></i>
                                        </div>
                                    @endif

                                    <div class="absolute inset-0 bg-gradient-to-t from-[#18181C] via-transparent to-transparent"></div>

                                    <div class="absolute top-6 right-6 flex gap-2">
                                        <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" onsubmit="return confirm('Remove this masterpiece?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-10 h-10 rounded-xl bg-black/50 border border-white/10 backdrop-blur text-red-500 hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-300 ease-in-out flex items-center justify-center">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="p-8">
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="text-[9px] font-black uppercase tracking-widest text-amber bg-white/5 border border-white/10 px-3 py-1 rounded-lg">
                                            {{ $favorite->recipe->category->name }}
                                        </span>
                                        <span class="text-silver-muted text-[10px] font-bold">
                                            <i class="far fa-clock mr-1 text-amber"></i> {{ $favorite->recipe->cook_time ?? '25' }} MIN
                                        </span>
                                    </div>

                                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-amber transition-colors">
                                        {{ $favorite->recipe->name }}
                                    </h3>

                                    <p class="text-silver text-sm line-clamp-2 mb-8 font-medium leading-relaxed">
                                        {{ $favorite->recipe->description }}
                                    </p>

                                    <div class="pt-6 border-t border-white/10">
                                        <a href="{{ route('my-recipes.show', $favorite->recipe->id) }}"
                                           class="flex items-center justify-between group/btn">
                                            <span class="text-xs font-black uppercase tracking-widest text-white group-hover/btn:text-amber transition-colors">Cook Now</span>
                                            <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center group-hover/btn:bg-amber group-hover/btn:text-black transition-all duration-300 ease-in-out">
                                                <i class="fas fa-chevron-right text-[10px]"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-32 text-center bg-surface border-2 border-dashed border-white/15 rounded-[2rem] animate-fade-up">
                        <div class="relative mb-8">
                            <div class="absolute inset-0 bg-amber/20 blur-3xl rounded-full"></div>
                            <div class="relative w-24 h-24 bg-black/40 border border-white/10 rounded-full flex items-center justify-center">
                                <i class="far fa-heart text-3xl text-amber"></i>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Your collection is empty</h3>
                        <p class="text-silver max-w-sm mb-10 font-medium leading-relaxed">
                            Every great chef needs a library of secrets. Start exploring and save your first recipe.
                        </p>
                        <a href="{{ route('dashboard') }}"
                           class="bg-amber text-black font-bold py-4 px-10 rounded-2xl hover:bg-amber-soft transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)]">
                            Browse Recipes
                        </a>
                    </div>
                @endif
            @else
                <div class="text-center py-20 bg-surface border border-white/10 rounded-[2rem]">
                    <i class="fas fa-lock text-4xl text-amber/20 mb-6"></i>
                    <h3 class="text-xl font-bold text-white mb-6">Login to see your favorites</h3>
                    <a href="{{ route('login') }}" class="bg-amber text-black font-bold py-3 px-8 rounded-xl hover:bg-amber-soft transition-colors duration-300 ease-in-out">Login</a>
                </div>
            @endauth
        </div>
    </div>
</x-app-layout>
