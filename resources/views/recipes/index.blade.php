<x-app-layout>
    <div class="relative bg-background min-h-screen overflow-hidden">

        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-amber/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[500px] h-[500px] bg-white/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="relative max-w-[1400px] mx-auto px-6 lg:px-12 py-16">

            <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-16 gap-8 animate-fade-up">
                <div class="space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber animate-pulse"></span>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-amber">Creator Studio</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold text-white tracking-tight leading-none">
                        Kitchen <span class="text-amber">Command</span> Center.
                    </h1>
                    <p class="text-silver text-lg max-w-xl font-medium">
                        Everything you've shared with the world, organized and ready for refinement.
                    </p>
                </div>

                <a href="{{ route('recipes.create') }}" class="group relative inline-flex items-center gap-3 bg-amber hover:bg-amber-soft text-black font-bold py-5 px-10 rounded-2xl transition-all duration-300 ease-in-out overflow-hidden shadow-[0_10px_30px_rgba(255,107,0,0.35)]">
                    <span class="relative z-10 uppercase tracking-widest text-xs">Post New Recipe</span>
                    <i class="fas fa-plus relative z-10 group-hover:rotate-90 transition-transform duration-300"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                <div class="bg-surface border border-white/10 p-10 rounded-[2rem] group hover:border-orange-500/30 hover:shadow-lg hover:shadow-orange-500/5 transition-all duration-300 ease-in-out">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-amber text-xl">
                            <i class="fas fa-book"></i>
                        </div>
                        <span class="text-[10px] font-bold text-amber uppercase tracking-widest">Total</span>
                    </div>
                    <p class="text-silver-muted text-xs font-bold uppercase tracking-[0.2em] mb-1">Recipes Shared</p>
                    <p class="text-5xl font-bold text-white">{{ $recipes->count() }}</p>
                </div>

                <div class="bg-surface border border-white/10 p-10 rounded-[2rem] group hover:border-orange-500/30 hover:shadow-lg hover:shadow-orange-500/5 transition-all duration-300 ease-in-out">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-amber text-xl">
                            <i class="fas fa-globe"></i>
                        </div>
                        <span class="text-[10px] font-bold text-amber uppercase tracking-widest">Live</span>
                    </div>
                    <p class="text-silver-muted text-xs font-bold uppercase tracking-[0.2em] mb-1">Visibility Status</p>
                    <p class="text-5xl font-bold text-white">Public</p>
                </div>

                <div class="bg-surface border border-white/10 p-10 rounded-[2rem] group transition-all duration-300 ease-in-out">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-black/30 flex items-center justify-center text-amber text-xl">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <span class="text-[10px] font-bold text-silver-muted uppercase tracking-widest">Avg</span>
                    </div>
                    <p class="text-silver-muted text-xs font-bold uppercase tracking-[0.2em] mb-1">Avg Cook Time</p>
                    <p class="text-5xl font-bold text-white">~25<span class="text-xl ml-2 font-medium text-silver-muted tracking-normal italic">min</span></p>
                </div>
            </div>

            <div class="bg-surface border border-white/10 rounded-[2rem] overflow-hidden shadow-[0_20px_60px_rgba(0,0,0,0.5)]">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-black/30">
                                <th class="px-10 py-8 text-silver-muted font-bold uppercase text-[10px] tracking-[0.2em]">The Recipe</th>
                                <th class="px-10 py-8 text-silver-muted font-bold uppercase text-[10px] tracking-[0.2em]">Category</th>
                                <th class="px-10 py-8 text-silver-muted font-bold uppercase text-[10px] tracking-[0.2em] text-center">Time</th>
                                <th class="px-10 py-8 text-silver-muted font-bold uppercase text-[10px] tracking-[0.2em] text-right">Management</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10 font-medium">
                            @forelse($recipes as $recipe)
                                <tr class="group hover:bg-white/5 transition-all duration-300">
                                    <td class="px-10 py-8">
                                        <div class="flex items-center space-x-6">
                                            <div class="relative w-20 h-20 shrink-0">
                                                <div class="relative w-full h-full rounded-2xl overflow-hidden border border-white/10 group-hover:border-amber/40 transition-colors">
                                                    <img src="{{ $recipe->image_url ?: 'https://via.placeholder.com/150' }}"
                                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $recipe->name }}">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-xl font-bold text-white mb-1 group-hover:text-amber transition-colors leading-none tracking-tight">{{ $recipe->name }}</p>
                                                <p class="text-silver-muted text-xs font-medium tracking-wide italic">Published on {{ $recipe->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-10 py-8">
                                        <span class="px-5 py-2 bg-white/5 text-amber text-[10px] font-bold rounded-xl border border-white/10 uppercase tracking-widest">
                                            {{ $recipe->category->name ?? 'Gourmet' }}
                                        </span>
                                    </td>
                                    <td class="px-10 py-8 text-center">
                                        <span class="text-lg font-bold text-white">{{ $recipe->cook_time }} <span class="text-[10px] text-silver-muted font-bold uppercase ml-1">min</span></span>
                                    </td>
                                    <td class="px-10 py-8">
                                        <div class="flex items-center justify-end space-x-4">
                                            <a href="{{ route('recipes.edit', $recipe->id) }}"
                                               class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-silver hover:bg-amber hover:text-black transition-all duration-300 ease-in-out">
                                                <i class="fas fa-pencil-alt text-sm"></i>
                                            </a>
                                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Delete this creation permanently?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-silver hover:bg-red-600 hover:text-white transition-all duration-300 ease-in-out">
                                                    <i class="fas fa-trash-alt text-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-10 py-32 text-center">
                                        <div class="flex flex-col items-center animate-fade-up">
                                            <div class="w-24 h-24 rounded-[2rem] bg-black/30 border border-white/10 flex items-center justify-center text-silver-muted mb-8">
                                                <i class="fas fa-utensils text-4xl"></i>
                                            </div>
                                            <p class="text-silver font-bold text-xl mb-6">Your gallery is waiting for its first masterpiece.</p>
                                            <a href="{{ route('recipes.create') }}" class="text-amber font-bold uppercase tracking-widest text-xs border-b-2 border-amber/30 pb-1 hover:border-amber transition-all">
                                                Start Creating
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
