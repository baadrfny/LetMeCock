<x-app-layout>
    <div class="py-12 bg-background text-white min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface border border-white/10 rounded-3xl p-6 shadow-[0_20px_60px_rgba(0,0,0,0.5)]">

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-amber tracking-tight">Ingredients Management</h1>
                </div>

                <div class="mb-8 p-4 bg-black/30 rounded-2xl border border-white/10">
                    <h2 class="text-xl font-semibold text-white mb-4">Add New Ingredient</h2>
                    <form action="{{ route('ingredients.store') }}" method="POST" class="flex gap-4">
                        @csrf
                        <input type="text" name="name" placeholder="Ingredient name" required
                               class="flex-1 px-4 py-2.5 bg-black/30 border border-white/10 rounded-xl text-white focus:border-amber focus:ring-0 placeholder-silver-muted font-medium">
                        <button type="submit" class="bg-amber hover:bg-amber-soft text-black font-bold px-5 py-2.5 rounded-xl transition-all duration-300 ease-in-out">
                            Add Ingredient
                        </button>
                    </form>
                </div>

                <div class="space-y-4">
                    <h2 class="text-xl font-semibold text-white mb-4">Existing Ingredients</h2>

                    @if($ingredients->count() > 0)
                        @foreach($ingredients as $ingredient)
                        <div class="flex items-center justify-between p-4 bg-black/30 rounded-2xl border border-white/10 hover:border-amber/40 transition-all duration-300 ease-in-out">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-white">{{ $ingredient->name }}</h3>
                                <p class="text-silver-muted text-sm">ID: {{ $ingredient->id }}</p>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                <form action="{{ route('ingredients.update', $ingredient) }}" method="POST" class="flex gap-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" value="{{ $ingredient->name }}" required
                                           class="px-3 py-1.5 bg-surface border border-white/10 rounded-lg text-white text-sm focus:border-amber focus:ring-0 font-medium">
                                    <button type="submit" class="bg-white/5 hover:bg-amber hover:text-black text-silver font-bold px-3 py-1.5 rounded-lg text-sm transition-all duration-300 ease-in-out">
                                        Update
                                    </button>
                                </form>

                                <form action="{{ route('ingredients.destroy', $ingredient) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-3 py-1.5 rounded-lg text-sm transition-all duration-300 ease-in-out">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-8 text-silver-muted">
                            <p>No ingredients found. Add your first ingredient above!</p>
                        </div>
                    @endif
                </div>

                @if(session('success'))
                    <div class="mt-6 p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
