<x-app-layout>
    <div class="relative bg-black overflow-hidden min-h-screen">
        
        <div class="absolute -top-40 -left-40 w-[700px] h-[700px] bg-cyan-600/10 rounded-full blur-[180px] opacity-80 z-0"></div>
        
        <div class="absolute -bottom-60 -right-60 w-[800px] h-[800px] bg-orange-600/10 rounded-full blur-[200px] opacity-70 z-0"></div>
        
        <div class="absolute top-[40%] -left-60 w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-[150px] opacity-60 z-0 animate-pulse-slow"></div>

        <section class="relative pt-16 pb-20 px-6 lg:px-12 items-center flex min-h-[90vh] z-10">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="z-10 order-2 lg:order-1">
                    <p class="text-orange-500 font-bold tracking-[0.3em] uppercase text-xs mb-4">
                        Affordable and very filling
                    </p>
                    <h1 class="text-6xl md:text-8xl font-black leading-[0.9] tracking-tighter text-white mb-8">
                        Hot, fresh <span class="text-orange-500 italic">recipes</span> <br> 
                        made for <span class="text-cyan-400">any time</span> cravings
                    </h1>
                    <p class="text-gray-400 max-w-lg text-lg mb-10 leading-relaxed">
                        Discover the art of cooking with fresh ingredients and easy-to-follow steps. 
                        Your next favorite meal is just one click away.
                    </p>
                    
                    <div class="flex flex-wrap gap-6 pt-4">
                        <a href="#explore" class="bg-orange-500 hover:bg-orange-600 text-black font-black py-4 px-10 rounded-xl shadow-[0_10px_30px_rgba(249,115,22,0.3)] transition-all transform hover:-translate-y-1 flex items-center">
                            <span>Start Cooking</span>
                            <i class="fas fa-utensils ml-3"></i>
                        </a>
                        <a href="{{ route('my-recipes.create') }}" class="group flex items-center space-x-4 bg-white/5 hover:bg-white/10 border border-white/10 py-4 px-8 rounded-xl transition-all backdrop-blur-md">
                            <span class="font-bold text-white">Share Recipe</span>
                            <div class="w-8 h-[2px] bg-cyan-500 group-hover:w-12 transition-all"></div>
                        </a>
                    </div>
                </div>

                <div class="relative flex justify-center items-center order-1 lg:order-2 min-h-[550px]">
                    <div class="absolute w-[650px] h-[650px] bg-orange-600/15 rounded-full blur-[180px] animate-pulse"></div>
                    
                    <div class="absolute w-[500px] h-[500px] bg-cyan-500/10 rounded-full blur-[150px] translate-x-20 -translate-y-12"></div>
                    
                    <div class="absolute w-[300px] h-[300px] bg-white/5 rounded-full blur-[100px]"></div>

                    <div class="relative z-10 animate-float">
                        <img src="https://pngimg.com/uploads/burger_sandwich/burger_sandwich_PNG4114.png" 
                             alt="Hero Food" 
                             class="w-full max-w-[580px] drop-shadow-[0_50px_60px_rgba(0,0,0,0.8)] transform -rotate-6">
                    </div>
                </div>
            </div>
        </section>

        <section id="explore" class="relative z-10 py-24 px-6 lg:px-12 bg-gray-950/40 border-t border-white/5 backdrop-blur-md">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-cyan-900/10 rounded-full blur-[150px] z-0"></div>

            <div class="max-w-7xl mx-auto relative z-20">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                    <div>
                        <h2 class="text-4xl font-black text-white mb-2 tracking-tight">Featured <span class="text-cyan-500">Recipes</span></h2>
                        <div class="h-1.5 w-20 bg-orange-500 rounded-full"></div>
                    </div>
                    
                    <div class="flex space-x-4 overflow-x-auto pb-2 no-scrollbar">
                        @foreach($categories as $category)
                            <button class="px-6 py-2 rounded-lg border border-white/10 bg-white/5 text-sm text-gray-400 hover:text-white hover:border-cyan-500 transition-all whitespace-nowrap">
                                {{ $category->name }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @forelse($recipes as $recipe)
                        <div class="group bg-gray-950/80 border border-white/5 rounded-[2.5rem] overflow-hidden hover:border-cyan-500/50 transition-all duration-500 shadow-2xl backdrop-blur-xl">
                            <div class="relative h-64 overflow-hidden">
                                <img src="{{ $recipe->image ? asset('storage/' . $recipe->image) : 'https://via.placeholder.com/400x300' }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                     alt="{{ $recipe->name }}">
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent opacity-90"></div>
                                
                                <div class="absolute top-6 right-6">
                                    <form action="{{ route('favorites.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                        <button type="submit" class="bg-black/40 backdrop-blur-md p-3 rounded-2xl text-white hover:text-orange-500 transition-all scale-90 group-hover:scale-100">
                                            <i class="{{ auth()->user()->favorites()->where('recipe_id', $recipe->id)->exists() ? 'fas' : 'far' }} fa-heart text-xl"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="p-10">
                                <div class="flex items-center justify-between mb-5">
                                    <span class="px-4 py-1.5 bg-cyan-950/50 text-cyan-400 text-xs font-bold rounded-lg uppercase tracking-widest border border-cyan-500/20">
                                        {{ $recipe->category->name ?? 'General' }}
                                    </span>
                                    <span class="text-gray-500 text-xs flex items-center">
                                        <i class="far fa-clock mr-1.5"></i> {{ $recipe->cook_time ?? '20' }} mins
                                    </span>
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-cyan-400 transition-colors">
                                    {{ $recipe->name }}
                                </h3>
                                <p class="text-gray-400 text-sm line-clamp-2 mb-8 leading-relaxed">
                                    {{ $recipe->description }}
                                </p>
                                
                                <a href="{{ route('my-recipes.show', $recipe->id) }}" class="flex items-center justify-between group/link text-white font-bold bg-white/5 p-2 pr-4 rounded-full border border-white/5 hover:border-orange-500/50 transition-all">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-gray-900 group-hover/link:bg-orange-500 transition-all">
                                        <i class="fas fa-arrow-right text-sm"></i>
                                    </div>
                                    <span class="text-sm">View Recipe</span>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20 text-gray-500 italic text-xl bg-gray-950 rounded-3xl border border-white/5">
                            No recipes found. Let's start cooking.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(-6deg); }
            50% { transform: translateY(-25px) rotate(-4deg); }
        }
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.6; transform: translateY(0px) scale(1); }
            50% { opacity: 0.8; transform: translateY(-10px) scale(1.05); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-slow { animation: pulse-slow 8s ease-in-out infinite; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</x-app-layout>