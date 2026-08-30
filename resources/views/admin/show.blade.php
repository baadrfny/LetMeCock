<x-app-layout>

    <div class="relative bg-background min-h-screen overflow-hidden text-white">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-amber/10 rounded-full blur-[120px] z-0"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-white/5 rounded-full blur-[120px] z-0"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 py-16">
            <div class="mb-12 animate-fade-up">
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <span class="px-4 py-1.5 bg-amber text-black text-[10px] font-bold rounded-lg uppercase tracking-widest">
                        {{ $recipe->category->name ?? 'General' }}
                    </span>
                    <span class="px-4 py-1.5 bg-white/5 text-silver text-[10px] font-bold rounded-lg uppercase tracking-widest border border-white/10">
                        {{ $recipe->country_origin }}
                    </span>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-4 uppercase leading-[0.9] text-white">
                    {{ $recipe->name }}
                </h1>
                <div class="h-1.5 w-32 bg-amber rounded-full shadow-[0_0_20px_rgba(255,107,0,0.3)]"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2 space-y-12">
                    @if($videoId)
                        <div class="relative group">
                            <div class="relative bg-surface border border-white/10 rounded-[2.5rem] overflow-hidden shadow-[0_20px_60px_rgba(0,0,0,0.5)]">
                                <div class="aspect-video w-full">
                                    <iframe
                                        src="https://www.youtube.com/embed/{{ $videoId }}"
                                        class="w-full h-full"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    @elseif($recipe->image)
                        <div class="rounded-[2.5rem] overflow-hidden border border-white/10 shadow-[0_20px_60px_rgba(0,0,0,0.5)]">
                            <img src="{{ $recipe->image_url }}" alt="{{ $recipe->name }}" class="w-full h-auto object-cover">
                        </div>
                    @endif

                    <div class="bg-surface border border-white/10 p-8 rounded-[2rem] shadow-[0_20px_60px_rgba(0,0,0,0.5)]">
                        <h2 class="text-2xl font-bold mb-4 text-amber uppercase tracking-tight">The Story</h2>
                        <p class="text-silver leading-relaxed text-lg italic">
                            "{{ $recipe->description }}"
                        </p>
                    </div>

                    <div class="bg-surface border border-white/10 p-8 rounded-[2rem] shadow-[0_20px_60px_rgba(0,0,0,0.5)]">
                        <h2 class="text-2xl font-bold mb-6 text-white uppercase tracking-tight italic">How to Prepare</h2>
                        <div class="text-silver leading-loose whitespace-pre-line text-lg font-medium">
                            {{ $recipe->preparation_steps }}
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-8">
                    <div class="bg-surface border border-white/10 p-10 rounded-[2.5rem] shadow-[0_20px_60px_rgba(0,0,0,0.5)] sticky top-24">
                        <h2 class="text-2xl font-bold mb-8 tracking-tight uppercase text-white">Quick Info</h2>
                        <div class="space-y-6 mb-10">
                            <div class="flex justify-between items-center border-b border-white/10 pb-4">
                                <span class="text-silver-muted text-xs font-bold uppercase tracking-widest">Cook Time</span>
                                <span class="text-white font-bold text-xl">{{ $recipe->cook_time }} Min</span>
                            </div>
                            <div class="flex justify-between items-center border-b border-white/10 pb-4">
                                <span class="text-silver-muted text-xs font-bold uppercase tracking-widest">Origin</span>
                                <span class="text-amber font-bold text-lg">{{ $recipe->country_origin }}</span>
                            </div>
                            <div class="flex justify-between items-center border-b border-white/10 pb-4">
                                <span class="text-silver-muted text-xs font-bold uppercase tracking-widest">Author</span>
                                <span class="text-emerald-400 font-bold">{{ $recipe->user->name ?? 'Chef' }}</span>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold mb-6 text-white uppercase tracking-tight">Ingredients</h3>
                        <ul class="space-y-4 mb-10">
                            @forelse($recipe->ingredients ?? [] as $ingredient)
                                <li class="flex items-start text-silver-muted text-sm font-medium group">
                                    <div class="w-1.5 h-1.5 bg-amber rounded-full mt-1.5 mr-3 group-hover:scale-150 transition-transform"></div>
                                    <span>
                                        {{ $ingredient->name }} -
                                        <span class="text-white font-bold">
                                            {{ optional($ingredient->pivot)->quantity }} {{ optional($ingredient->pivot)->unit }}
                                        </span>
                                    </span>
                                </li>
                            @empty
                                <li class="text-silver-muted italic">No ingredients found.</li>
                            @endforelse
                        </ul>

                        <div class="pt-8 border-t border-white/10 space-y-4">
                            @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::id() === $recipe->user_id))
                                <a href="{{ route('recipes.edit', $recipe) }}"
                                   class="block w-full text-center bg-amber hover:bg-amber-soft text-black font-bold py-4 rounded-2xl transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)]">
                                    Edit Recipe
                                </a>
                                <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Confirm deletion?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full text-center text-red-500 hover:text-red-400 font-bold transition py-2 text-sm uppercase tracking-widest">
                                        Delete
                                    </button>
                                </form>
                            @endif
                            <a href="{{ url()->previous() }}" class="block w-full text-center text-silver-muted hover:text-amber font-bold transition text-sm">
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
