<x-app-layout>
    @php
        $usedCategories = $categories->whereIn('id', $recipes->pluck('category_id')->filter()->unique()->values());
    @endphp

    <div class="relative min-h-screen bg-background text-white overflow-hidden">
        <div class="absolute -top-[15%] right-[-10%] w-[700px] h-[700px] bg-amber/10 rounded-full blur-[150px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-white/5 rounded-full blur-[150px] pointer-events-none"></div>

        <div class="relative max-w-[1400px] mx-auto px-6 lg:px-10">

            <section class="relative pt-16 pb-16 flex flex-col lg:flex-row items-center gap-12 min-h-[70vh]">

                <div class="flex-1 text-center lg:text-left animate-fade-up">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 mb-8">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber animate-pulse"></span>
                        <span class="text-[10px] font-bold tracking-[0.2em] uppercase text-amber">Master the Kitchen</span>
                    </div>

                    <h1 class="text-5xl md:text-7xl font-bold leading-[0.95] tracking-tight mb-8 text-white">
                        Elevate your <br>
                        <span class="text-amber">everyday</span> <br>
                        cooking.
                    </h1>

                    <p class="text-silver text-lg md:text-xl max-w-lg mb-10 font-normal leading-relaxed">
                        A curated collection of professional recipes designed for your home kitchen.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center gap-6 justify-center lg:justify-start">
                        <a href="#explore" class="bg-amber hover:bg-amber-soft text-black font-bold py-4 px-12 rounded-2xl transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)] hover:scale-105 active:scale-95">
                            Browse Recipes
                        </a>
                        @auth
                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('recipes.create') }}" class="group flex items-center gap-3 text-silver font-semibold transition-colors hover:text-white">
                            <span class="border-b-2 border-white/10 group-hover:border-amber transition-all">Add yours</span>
                            <i class="fas fa-plus text-xs text-amber"></i>
                        </a>
                        @endif
                        @endauth
                    </div>
                </div>


                <div class="flex-1 relative">
                    <div class="absolute inset-0 bg-amber/10 rounded-full blur-[100px]"></div>
                    <div class="relative z-10 animate-float-slow">
                        <img src="https://pngimg.com/uploads/burger_sandwich/burger_sandwich_PNG4114.png"
                             class="w-full max-w-[500px] mx-auto drop-shadow-[0_20px_40px_rgba(0,0,0,0.6)]"
                             alt="Gourmet Burger">
                    </div>
                </div>
            </section>

            <section class="py-4 border-y border-white/10 glass-header rounded-2xl px-6 mb-16">
                <div class="flex items-center justify-between gap-8">
                    <h2 class="hidden md:block text-sm font-bold uppercase tracking-widest text-amber">Categories</h2>
                    <div class="flex gap-4 overflow-x-auto no-scrollbar py-3" data-category-filters>
                        <button type="button" data-category-filter="all" class="px-8 py-2.5 rounded-xl bg-amber text-black text-xs font-bold transition-all duration-300 ease-in-out whitespace-nowrap">All</button>
                        @foreach($usedCategories as $category)
                            <button type="button" data-category-filter="{{ $category->id }}" class="px-8 py-2.5 rounded-xl bg-surface border border-white/10 text-xs font-bold text-silver hover:bg-surface-elevated transition-all duration-300 ease-in-out whitespace-nowrap">
                                {{ $category->name }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="explore" class="pb-32">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-recipe-grid>
                    @forelse($recipes as $recipe)
                        <div data-recipe-card data-category-id="{{ $recipe->category_id }}" class="group relative flex flex-col bg-surface border border-white/10 rounded-[2rem] overflow-hidden hover:border-orange-500/30 hover:shadow-lg hover:shadow-orange-500/5 transition-all duration-300 ease-in-out">

                            <div class="relative h-80 overflow-hidden">
                                <img src="{{ $recipe->image_url ?: 'https://via.placeholder.com/600x800' }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                                <div class="absolute inset-0 bg-gradient-to-t from-[#18181C] via-transparent to-black/20"></div>

                                <div class="absolute top-6 left-6">
                                    <span class="bg-black/50 backdrop-blur-md text-[10px] font-bold px-4 py-2 rounded-full border border-white/10 uppercase tracking-tighter text-white">
                                        {{ $recipe->category->name ?? 'Premium' }}
                                    </span>
                                </div>

                                @auth
                                    @if(auth()->user()->role === 'user')
                                    @if(auth()->user()->favorites()->where('recipe_id', $recipe->id)->exists())
                                        <form action="{{ route('favorites.destroy', auth()->user()->favorites()->where('recipe_id', $recipe->id)->first()->id) }}" method="POST" class="absolute top-6 right-6">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-10 h-10 rounded-full bg-amber flex items-center justify-center text-black hover:bg-amber-soft transition-all shadow-[0_6px_16px_rgba(255,107,0,0.35)]">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('favorites.store') }}" method="POST" class="absolute top-6 right-6">
                                            @csrf
                                            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                            <button type="submit" class="w-10 h-10 rounded-full bg-black/50 backdrop-blur-xl border border-white/10 flex items-center justify-center text-silver hover:bg-amber hover:text-black hover:border-amber transition-all duration-300 ease-in-out">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </form>
                                    @endif
                                    @endif
                                @endauth
                            </div>

                            <div class="p-8 flex flex-col flex-grow">
                                <div class="flex items-center gap-4 mb-6">
                                    <span class="text-[10px] font-bold text-silver uppercase tracking-widest flex items-center">
                                        <i class="far fa-clock mr-2 text-amber"></i> {{ $recipe->cook_time ?? '25' }} MINS
                                    </span>
                                    <span class="w-1 h-1 rounded-full bg-white/20"></span>
                                    <span class="text-[10px] font-bold text-silver uppercase tracking-widest">Easy Level</span>
                                </div>

                                <h3 class="text-2xl font-bold mb-4 leading-tight text-white group-hover:text-amber transition-colors">
                                    {{ $recipe->name }}
                                </h3>

                                <p class="text-silver text-sm leading-relaxed mb-10 line-clamp-2">
                                    {{ $recipe->description }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('my-recipes.show', $recipe->id) }}" class="flex items-center justify-between group/btn border-t border-white/10 pt-5">
                                        <span class="text-xs font-bold uppercase tracking-widest text-silver group-hover/btn:text-amber transition-colors">View Recipe</span>
                                        <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center group-hover/btn:bg-amber group-hover/btn:text-black group-hover/btn:border-amber transition-all duration-300 ease-in-out group-hover/btn:rotate-[-45deg]">
                                            <i class="fas fa-arrow-right text-xs"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20 bg-surface rounded-[2rem] border border-white/10 animate-fade-up" data-no-recipes-server>
                            <p class="text-silver italic">No recipes found. Let's create something new!</p>
                        </div>
                    @endforelse
                </div>

                @if($recipes->isNotEmpty())
                    <div data-no-recipes-filtered class="hidden text-center py-20 bg-surface rounded-[2rem] border border-white/10 mt-10">
                        <p class="text-silver italic">No recipes found in this category.</p>
                    </div>
                @endif
            </section>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterButtons = document.querySelectorAll('[data-category-filter]');
            const recipeCards = document.querySelectorAll('[data-recipe-card]');
            const emptyState = document.querySelector('[data-no-recipes-filtered]');

            if (!filterButtons.length || !recipeCards.length) {
                return;
            }

            const updateActiveButton = (selectedCategory) => {
                filterButtons.forEach((button) => {
                    const isActive = button.dataset.categoryFilter === selectedCategory;

                    button.classList.toggle('bg-amber', isActive);
                    button.classList.toggle('text-black', isActive);
                    button.classList.toggle('bg-surface', !isActive);
                    button.classList.toggle('border', !isActive);
                    button.classList.toggle('border-white/10', !isActive);
                    button.classList.toggle('text-silver', !isActive);
                });
            };

            const filterRecipes = (selectedCategory) => {
                let visibleCount = 0;

                recipeCards.forEach((card) => {
                    const matches = selectedCategory === 'all' || card.dataset.categoryId === selectedCategory;
                    card.classList.toggle('hidden', !matches);

                    if (matches) {
                        visibleCount++;
                    }
                });

                if (emptyState) {
                    emptyState.classList.toggle('hidden', visibleCount !== 0);
                }

                updateActiveButton(selectedCategory);
            };

            filterButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    filterRecipes(button.dataset.categoryFilter);
                });
            });
        });
    </script>
</x-app-layout>
