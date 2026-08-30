<x-app-layout>
    <div class="relative bg-background min-h-screen overflow-hidden text-white">

        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-amber/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[500px] h-[500px] bg-white/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 py-16 relative z-10">

            <div class="mb-12 animate-fade-up">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 mb-6">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber animate-pulse"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-amber">Mission Control</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight leading-none text-white">
                    Admin <span class="text-amber">Dashboard</span>
                </h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-surface border border-white/10 p-8 rounded-[2rem] shadow-[0_20px_60px_rgba(0,0,0,0.5)] relative overflow-hidden group hover:border-orange-500/30 hover:shadow-lg hover:shadow-orange-500/5 transition-all duration-300 ease-in-out">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-30 transition-opacity">
                        <i class="fas fa-utensils text-5xl text-amber"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-2 text-white">{{ $recipes->count() }}</h3>
                    <p class="text-amber text-[10px] font-bold uppercase tracking-widest">Total Recipes</p>
                </div>

                <div class="bg-surface border border-white/10 p-8 rounded-[2rem] shadow-[0_20px_60px_rgba(0,0,0,0.5)] relative overflow-hidden group hover:border-orange-500/30 hover:shadow-lg hover:shadow-orange-500/5 transition-all duration-300 ease-in-out">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-30 transition-opacity">
                        <i class="fas fa-layer-group text-5xl text-amber"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-2 text-white">{{ App\Models\Categories::count() }}</h3>
                    <p class="text-amber text-[10px] font-bold uppercase tracking-widest">Live Categories</p>
                </div>

                <div class="bg-surface border border-white/10 p-8 rounded-[2rem] shadow-[0_20px_60px_rgba(0,0,0,0.5)] relative overflow-hidden group hover:border-orange-500/30 hover:shadow-lg hover:shadow-orange-500/5 transition-all duration-300 ease-in-out">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-30 transition-opacity">
                        <i class="fas fa-seedling text-5xl text-amber"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-2 text-white">{{ App\Models\Ingredient::count() }}</h3>
                    <p class="text-amber text-[10px] font-bold uppercase tracking-widest">Ingredients</p>
                </div>
            </div>

            <div class="bg-surface border border-white/10 rounded-[3rem] overflow-hidden shadow-[0_20px_60px_rgba(0,0,0,0.5)]">
                <div class="p-10 border-b border-white/10 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-black/30">
                    <h2 class="text-2xl font-bold tracking-tight text-white">Recent Masterpieces</h2>
                    <a href="{{ route('recipes.create') }}" class="bg-amber hover:bg-amber-soft text-black px-6 py-3 rounded-2xl text-[10px] font-bold uppercase tracking-widest transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)]">
                        + Add New Recipe
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-silver-muted text-[10px] font-bold uppercase tracking-[0.2em] bg-black/30">
                                <th class="px-10 py-6">Visual & Details</th>
                                <th class="px-10 py-6">Category</th>
                                <th class="px-10 py-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10 font-medium">
                            @foreach($recipes as $recipe)
                            <tr class="group hover:bg-white/5 transition-all duration-300">
                                <td class="px-10 py-8">
                                    <div class="flex items-center space-x-8">
                                        <div class="relative w-24 h-24 shrink-0 rounded-[1.5rem] overflow-hidden border border-white/10 group-hover:border-amber/50 transition-all duration-500 shadow-[0_20px_40px_rgba(0,0,0,0.5)]">
                                            @if($recipe->image)
                                                <img src="{{ $recipe->image_url }}" class="w-full h-full object-cover scale-110 group-hover:scale-100 transition-transform duration-700" alt="{{ $recipe->name }}">
                                            @else
                                                <div class="w-full h-full bg-black/30 flex items-center justify-center">
                                                    <i class="fas fa-utensils text-silver-muted text-xl"></i>
                                                </div>
                                            @endif
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        </div>

                                        <div class="space-y-1">
                                            <div class="text-xl font-bold text-white leading-none tracking-tight group-hover:text-amber transition-colors">{{ $recipe->name }}</div>
                                            <div class="text-silver-muted text-xs font-medium max-w-sm line-clamp-1 italic">"{{ $recipe->description }}"</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-10 py-8">
                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 text-amber rounded-xl text-[10px] font-bold uppercase tracking-widest border border-white/10 group-hover:bg-amber group-hover:text-black transition-all">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber group-hover:bg-black"></span>
                                        {{ $recipe->category->name }}
                                    </span>
                                </td>

                                <td class="px-10 py-8">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('recipes.edit', $recipe->id) }}" class="flex items-center gap-2 px-5 py-2.5 bg-black/30 hover:bg-amber text-silver hover:text-black rounded-xl border border-white/10 hover:border-amber transition-all text-[10px] font-bold uppercase tracking-widest">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Archive this masterpiece? This action is permanent.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex items-center gap-2 px-5 py-2.5 bg-red-500/10 hover:bg-red-600 text-red-500 hover:text-white rounded-xl border border-red-500/30 hover:border-red-600 transition-all text-[10px] font-bold uppercase tracking-widest">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
