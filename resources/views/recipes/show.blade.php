<x-app-layout>
    <div class="relative bg-background min-h-screen overflow-hidden">

        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-amber/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-white/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="relative max-w-5xl mx-auto px-6 py-12">

            <div class="flex justify-between items-center mb-12 animate-fade-up">
                <a href="{{ route('dashboard') }}" class="group flex items-center gap-2 text-silver hover:text-amber transition-all duration-300 ease-in-out">
                    <i class="fas fa-chevron-left text-[10px] group-hover:-translate-x-1 transition-transform"></i>
                    <span class="text-xs font-bold uppercase tracking-widest">Back to Recipes</span>
                </a>

                @auth
                @if(Auth::id() === $recipe->user_id || Auth::user()->role === 'admin')
                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="bg-surface border border-white/10 hover:border-amber/40 hover:text-amber hover:bg-white/5 px-6 py-2 rounded-xl text-xs font-bold uppercase tracking-widest transition-all duration-300 ease-in-out text-silver">
                        Edit Recipe
                    </a>
                @endif
                @endauth
            </div>

            <div class="relative h-[500px] rounded-[2rem] overflow-hidden mb-12 border border-white/10 shadow-[0_20px_60px_rgba(0,0,0,0.6)] animate-fade-up">
                <img src="{{ $recipe->image_url ?: 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1000' }}"
                     class="w-full h-full object-cover" alt="{{ $recipe->name }}">

                @auth
                    @if(! auth()->user()->role=== 'admin')
                    @if(auth()->user()->favorites()->where('recipe_id', $recipe->id)->exists())
                        <form action="{{ route('favorites.destroy', auth()->user()->favorites()->where('recipe_id', $recipe->id)->first()->id) }}" method="POST" class="absolute top-6 right-20 z-20">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-10 h-10 rounded-full bg-amber border border-amber flex items-center justify-center text-black hover:bg-amber-soft transition-all shadow-[0_6px_16px_rgba(255,107,0,0.35)]">
                                <i class="fas fa-heart"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('favorites.store') }}" method="POST" class="absolute top-6 right-20 z-20">
                            @csrf
                            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                            <button type="submit" class="w-10 h-10 rounded-full bg-black/50 backdrop-blur-xl border border-white/10 flex items-center justify-center text-silver hover:bg-amber hover:text-black hover:border-amber transition-all duration-300 ease-in-out">
                                <i class="far fa-heart"></i>
                            </button>
                        </form>
                    @endif
                    @endif
                @endauth

                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent pointer-events-none"></div>

                <div class="absolute bottom-12 left-12 right-12">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-4 py-1.5 bg-amber text-black text-[10px] font-bold uppercase tracking-[0.2em] rounded-lg">
                            {{ $recipe->category->name }}
                        </span>
                        <span class="px-4 py-1.5 bg-black/50 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-lg border border-white/10">
                            <i class="far fa-clock mr-2 text-amber"></i> {{ $recipe->cook_time ?? '30' }} Minutes
                        </span>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold text-white tracking-tight leading-none">{{ $recipe->name }}</h1>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <div class="lg:col-span-2 space-y-12">

                    <section>
                        <h2 class="text-[10px] font-bold uppercase tracking-[0.3em] text-amber mb-6 flex items-center gap-4">
                            The Story <span class="h-px bg-white/10 flex-grow"></span>
                        </h2>
                        <p class="text-silver text-xl font-medium leading-relaxed italic">
                            "{{ $recipe->description }}"
                        </p>
                    </section>

                    @if($recipe->video_url)
                    <section class="bg-surface border border-white/10 rounded-[2rem] p-10">
                        <h2 class="text-2xl font-bold text-white mb-8 tracking-tight flex items-center gap-3">
                            <i class="fas fa-play-circle text-amber"></i>
                            Video Tutorial
                        </h2>
                        <div class="aspect-video rounded-2xl overflow-hidden bg-black/30 border border-white/10">
                            @if($videoId)
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    class="w-full h-full">
                                </iframe>
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <a href="{{ $recipe->video_url }}" target="_blank" class="bg-amber hover:bg-amber-soft text-black font-bold py-4 px-8 rounded-2xl transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)] uppercase tracking-widest text-[10px] flex items-center gap-3">
                                        <i class="fas fa-external-link-alt"></i>
                                        Watch Video
                                    </a>
                                </div>
                            @endif
                        </div>
                    </section>
                    @endif

                    <section class="bg-surface border border-white/10 rounded-[2rem] p-10">
                        <h2 class="text-2xl font-bold text-white mb-8 tracking-tight">Preparation Steps</h2>
                        <div class="space-y-8 text-silver font-medium leading-relaxed">

                            <div class="flex gap-6">
                                <span class="text-amber text-2xl italic font-bold">01.</span>
                                <p>Begin by carefully selecting the freshest ingredients. Quality is the soul of this dish.</p>
                            </div>
                            <div class="flex gap-6">
                                <span class="text-amber text-2xl italic font-bold">02.</span>
                                <p>Follow the traditional method of blending spices to ensure the depth of flavor is captured.</p>
                            </div>
                            <p class="text-sm text-silver-muted mt-6 border-t border-white/10 pt-6 italic">
                                * Detailed instructions for this masterpiece are provided in the chef's notes.
                            </p>
                        </div>
                    </section>

                </div>

                <div class="lg:col-span-1">
                    <div class="sticky top-24 bg-surface border border-white/10 rounded-[2rem] p-8 shadow-[0_20px_60px_rgba(0,0,0,0.5)] overflow-hidden">
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-amber/10 blur-3xl rounded-full"></div>

                        <h2 class="text-xl font-bold text-white mb-8 flex items-center justify-between">
                            Ingredients
                            <i class="fas fa-shopping-basket text-amber text-sm"></i>
                        </h2>

                        <ul class="space-y-4">
                            @forelse($recipe->ingredients as $ingredient)
                                <li class="flex items-center justify-between group py-3 border-b border-white/10 last:border-0">
                                    <span class="text-white font-bold group-hover:text-amber transition-colors duration-300 ease-in-out">
                                        {{ $ingredient->name }}
                                    </span>
                                    <span class="text-xs font-bold text-amber bg-white/5 px-3 py-1 rounded-lg border border-white/10">
                                        {{ $ingredient->pivot->quantity }} {{ $ingredient->pivot->unit }}
                                    </span>
                                </li>
                            @empty
                                <li class="text-silver-muted italic text-sm py-4">The secret is in the air... no ingredients listed.</li>
                            @endforelse
                        </ul>

                        <button class="w-full mt-10 bg-amber hover:bg-amber-soft text-black font-bold py-4 rounded-2xl transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)] uppercase tracking-widest text-[10px]">
                            Add to Grocery List
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
