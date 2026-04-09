<x-app-layout>
    <div class="relative bg-black min-h-screen overflow-hidden">
        
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-600/10 rounded-full blur-[150px] z-0"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-orange-600/10 rounded-full blur-[150px] z-0"></div>

        <div class="max-w-7xl mx-auto px-6 py-12 relative z-10">
            
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-6">
                <div>
                    <h1 class="text-4xl font-black text-white mb-2 tracking-tight">
                        My <span class="text-orange-500">Recipes</span> Collection
                    </h1>
                    <p class="text-gray-400">Manage, edit, and update your shared culinary masterpieces.</p>
                </div>
                
                <a href="{{ route('my-recipes.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-black font-black py-3 px-8 rounded-xl shadow-[0_10px_20px_rgba(6,182,212,0.3)] transition-all transform hover:-translate-y-1 text-center">
                    Add New Recipe
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gray-900/40 border border-white/5 p-6 rounded-3xl backdrop-blur-md">
                    <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-1">Total Recipes</p>
                    <p class="text-3xl font-black text-white">{{ $recipes->count() }}</p>
                </div>
                <div class="bg-gray-900/40 border border-white/5 p-6 rounded-3xl backdrop-blur-md border-l-cyan-500/50">
                    <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-1">Active Now</p>
                    <p class="text-3xl font-black text-cyan-400">Published</p>
                </div>
                <div class="bg-gray-900/40 border border-white/5 p-6 rounded-3xl backdrop-blur-md border-l-orange-500/50">
                    <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-1">Avg. Cook Time</p>
                    <p class="text-3xl font-black text-orange-400">25 Mins</p>
                </div>
            </div>

            <div class="bg-gray-950/60 border border-white/5 rounded-[2.5rem] overflow-hidden backdrop-blur-xl shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-8 py-6 text-gray-400 font-bold uppercase text-xs tracking-widest">Recipe</th>
                                <th class="px-8 py-6 text-gray-400 font-bold uppercase text-xs tracking-widest">Category</th>
                                <th class="px-8 py-6 text-gray-400 font-bold uppercase text-xs tracking-widest text-center">Cook Time</th>
                                <th class="px-8 py-6 text-gray-400 font-bold uppercase text-xs tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse($recipes as $recipe)
                                <tr class="group hover:bg-white/5 transition-colors">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-16 h-16 rounded-2xl overflow-hidden border border-white/10 shrink-0">
                                                <img src="{{ $recipe->image ? asset('storage/' . $recipe->image) : 'https://via.placeholder.com/150' }}" 
                                                     class="w-full h-full object-cover" alt="{{ $recipe->name }}">
                                            </div>
                                            <div>
                                                <p class="text-white font-bold text-lg group-hover:text-cyan-400 transition-colors">{{ $recipe->name }}</p>
                                                <p class="text-gray-500 text-xs line-clamp-1">{{ Str::limit($recipe->description, 40) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="px-4 py-1.5 bg-gray-900 text-gray-300 text-xs font-bold rounded-lg border border-white/5 uppercase tracking-wider">
                                            {{ $recipe->category->name ?? 'General' }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        <span class="text-white font-medium italic">{{ $recipe->cook_time }} mins</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('my-recipes.edit', $recipe->id) }}" 
                                               class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-cyan-400 hover:border-cyan-400/50 transition-all">
                                                <i class="fas fa-edit text-sm"></i>
                                            </a>
                                            <form action="{{ route('my-recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-500/50 transition-all">
                                                    <i class="fas fa-trash-alt text-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center">
                                            <i class="fas fa-utensils text-gray-700 text-5xl mb-4"></i>
                                            <p class="text-gray-500 italic text-lg">You haven't shared any recipes yet.</p>
                                            <a href="{{ route('my-recipes.create') }}" class="text-cyan-400 mt-2 font-bold hover:underline italic underline-offset-4">
                                                Create your first masterpiece now
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-8 text-gray-400">
                {{-- {{ $recipes->links() }} --}}
            </div>
        </div>
    </div>
</x-app-layout>