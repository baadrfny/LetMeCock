<x-app-layout>
    <div class="relative min-h-screen bg-background text-white font-sans overflow-hidden">

        <!-- Ambient glows -->
        <div class="absolute -top-[15%] right-[-10%] w-[700px] h-[700px] bg-amber/10 rounded-full blur-[150px] pointer-events-none"></div>
        <div class="absolute top-[40%] left-[-15%] w-[600px] h-[600px] bg-white/5 rounded-full blur-[150px] pointer-events-none"></div>

        <!-- ============ HERO: 2-column ============ -->
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 pt-20 lg:pt-28 pb-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- LEFT: copy + tools -->
                <div class="animate-fade-up">
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/5 border border-white/10 text-[10px] font-bold uppercase tracking-[0.2em] text-amber mb-8">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber animate-pulse"></span>
                        AI Assistant
                    </span>

                    <h1 class="text-5xl md:text-7xl font-bold tracking-tight leading-[1.05] mb-8">
                        EMPTY FRIDGE?<br>
                        <span class="text-amber">NO PROBLEM.</span>
                    </h1>

                    <p class="text-silver text-xl font-medium mb-10 max-w-md leading-relaxed">
                        Tell us what's in your pantry and our AI whips up chef-grade recipes in seconds — no waste, just taste.
                    </p>

                    <!-- Search / ingredient input bar with integrated actions -->
                    <div class="relative group max-w-lg">
                        <div class="flex items-center gap-2 bg-surface border border-white/10 rounded-2xl p-2 pl-6 shadow-[0_20px_60px_rgba(0,0,0,0.5)] focus-within:border-amber/50 transition-all duration-300 ease-in-out">
                            <i class="fas fa-magic text-amber"></i>
                            <input type="text"
                                   placeholder="Type your ingredients... (Chicken, Lime, Garlic)"
                                   class="flex-1 bg-transparent py-3 text-white focus:outline-none placeholder-silver-muted text-sm">
                            <button class="shrink-0 bg-amber hover:bg-amber-soft text-black font-bold text-xs uppercase tracking-widest px-5 py-3 rounded-xl transition-all duration-300 ease-in-out shadow-[0_8px_24px_rgba(255,107,0,0.35)]">
                                Cook It
                            </button>
                        </div>
                    </div>

                    <!-- Quick tags -->
                    <div class="flex flex-wrap items-center gap-2 mt-6 max-w-lg">
                        <span class="text-silver-muted text-xs font-bold uppercase tracking-widest mr-1">Try:</span>
                        <button class="chip hover:border-amber/40 hover:text-white">Chicken</button>
                        <button class="chip hover:border-amber/40 hover:text-white">Pasta</button>
                        <button class="chip hover:border-amber/40 hover:text-white">Vegetarian</button>
                        <button class="chip hover:border-amber/40 hover:text-white">Quick</button>
                    </div>
                </div>

                <!-- RIGHT: floating visual (card stack) -->
                <div class="relative hidden lg:block h-[520px] animate-fade-in" style="animation-delay: 0.15s">
                    <!-- base card -->
                    <div class="absolute top-8 left-6 w-[280px] rounded-[2rem] overflow-hidden border border-white/10 rotate-[-6deg] opacity-60 animate-float-slow">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=600" class="w-full h-72 object-cover" alt="Flame-grilled dish">
                    </div>

                    <!-- mid card -->
                    <div class="absolute top-4 right-4 w-[300px] rounded-[2rem] overflow-hidden border border-white/10 rotate-[5deg] opacity-80" style="animation: floatSlow 7s ease-in-out infinite;">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&q=80&w=600" class="w-full h-72 object-cover" alt="Bowl">
                    </div>

                    <!-- featured card -->
                    <div class="absolute bottom-2 left-1/2 -translate-x-1/2 w-[340px] bg-surface-elevated border border-white/10 rounded-[2rem] p-6 shadow-[0_30px_80px_rgba(0,0,0,0.7)]">
                        <div class="flex items-center gap-3 mb-5">
                            <span class="px-3 py-1 bg-amber text-black text-[10px] font-bold uppercase tracking-widest rounded-lg">Ready in 15m</span>
                            <span class="text-silver-muted text-[10px] font-bold uppercase tracking-widest flex items-center gap-1">
                                <i class="fas fa-star text-amber"></i> 4.9
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold tracking-tight mb-1">Midnight Ramen</h3>
                        <p class="text-silver text-sm mb-5 leading-relaxed">Spicy, savoury, and made entirely from what's in your fridge.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex -space-x-2">
                                <span class="w-8 h-8 rounded-full bg-surface border border-white/10 flex items-center justify-center text-amber text-xs"><i class="fas fa-drumstick-bite"></i></span>
                                <span class="w-8 h-8 rounded-full bg-surface border border-white/10 flex items-center justify-center text-amber text-xs"><i class="fas fa-carrot"></i></span>
                                <span class="w-8 h-8 rounded-full bg-surface border border-white/10 flex items-center justify-center text-amber text-xs"><i class="fas fa-pepper-hot"></i></span>
                            </div>
                            <button class="flex items-center gap-2 text-amber hover:text-amber-soft transition-colors font-bold text-xs uppercase tracking-widest">
                                View Recipe <i class="fas fa-chevron-right text-[10px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============ RECOMMENDED GRID (asymmetrical) ============ -->
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 pb-24">
            <div class="flex items-end justify-between mb-10">
                <div>
                    <h3 class="text-3xl font-bold tracking-tight mb-2 animate-fade-up">Recommended for You</h3>
                    <p class="text-silver font-medium">Based on your available ingredients</p>
                </div>
                <a href="{{ route('dashboard') }}" class="hidden sm:inline-flex items-center gap-2 text-amber hover:text-amber-soft transition-colors text-xs font-bold uppercase tracking-widest">
                    View All <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-glass card-glass-hover group overflow-hidden animate-fade-up">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Mediterranean bowl">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#18181C] to-transparent"></div>
                        <button class="absolute top-4 right-4 w-10 h-10 rounded-full bg-black/40 backdrop-blur border border-white/10 flex items-center justify-center text-silver hover:text-amber hover:border-amber/40 transition-all duration-300 ease-in-out">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="chip">15 Min</span>
                            <span class="chip">Vegan</span>
                        </div>
                        <h4 class="text-xl font-bold tracking-tight mb-2 group-hover:text-amber transition-colors">Mediterranean Zen Bowl</h4>
                        <p class="text-silver text-sm mb-6 leading-relaxed">Crisp veggies, creamy hummus, and warm spices in one bowl.</p>
                        <a href="#" class="flex items-center justify-between border-t border-white/10 pt-4 group/btn">
                            <span class="text-xs font-bold uppercase tracking-widest text-white group-hover/btn:text-amber transition-colors">Cook Now</span>
                            <span class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center group-hover/btn:bg-amber group-hover/btn:text-black transition-all duration-300 ease-in-out"><i class="fas fa-chevron-right text-[10px]"></i></span>
                        </a>
                    </div>
                </div>

                <div class="card-glass card-glass-hover group overflow-hidden animate-fade-up md:translate-y-6" style="animation-delay: 0.1s">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Smokey steak">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#18181C] to-transparent"></div>
                        <button class="absolute top-4 right-4 w-10 h-10 rounded-full bg-black/40 backdrop-blur border border-white/10 flex items-center justify-center text-silver hover:text-amber hover:border-amber/40 transition-all duration-300 ease-in-out">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="chip chip-active">Top Rated</span>
                            <span class="chip">35 Min</span>
                        </div>
                        <h4 class="text-xl font-bold tracking-tight mb-2 group-hover:text-amber transition-colors">Smokey Garlic Roasted Steak</h4>
                        <p class="text-silver text-sm mb-6 leading-relaxed">Charred, garlicky, and ridiculously tender with a peppery crust.</p>
                        <a href="#" class="flex items-center justify-between border-t border-white/10 pt-4 group/btn">
                            <span class="text-xs font-bold uppercase tracking-widest text-white group-hover/btn:text-amber transition-colors">Cook Now</span>
                            <span class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center group-hover/btn:bg-amber group-hover/btn:text-black transition-all duration-300 ease-in-out"><i class="fas fa-chevron-right text-[10px]"></i></span>
                        </a>
                    </div>
                </div>

                <div class="card-glass card-glass-hover group overflow-hidden animate-fade-up" style="animation-delay: 0.2s">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1476718406336-bb5a9690ee2a?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Mushroom soup">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#18181C] to-transparent"></div>
                        <button class="absolute top-4 right-4 w-10 h-10 rounded-full bg-black/40 backdrop-blur border border-white/10 flex items-center justify-center text-silver hover:text-amber hover:border-amber/40 transition-all duration-300 ease-in-out">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="chip">Vegetarian</span>
                            <span class="chip">20 Min</span>
                        </div>
                        <h4 class="text-xl font-bold tracking-tight mb-2 group-hover:text-amber transition-colors">Rustic Mushroom & Thyme Soup</h4>
                        <p class="text-silver text-sm mb-6 leading-relaxed">Earthy, comforting, and soul-warming with a swirl of cream.</p>
                        <a href="#" class="flex items-center justify-between border-t border-white/10 pt-4 group/btn">
                            <span class="text-xs font-bold uppercase tracking-widest text-white group-hover/btn:text-amber transition-colors">Cook Now</span>
                            <span class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center group-hover/btn:bg-amber group-hover/btn:text-black transition-all duration-300 ease-in-out"><i class="fas fa-chevron-right text-[10px]"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============ CTA BAND ============ -->
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 pb-24">
            <div class="bg-gradient-to-br from-surface to-surface-elevated border border-white/10 rounded-[2.5rem] p-12 lg:p-16 flex flex-col md:flex-row items-center justify-between gap-10 animate-fade-up">
                <div class="max-w-md">
                    <span class="chip mb-6">The 3-Step Method</span>
                    <h2 class="text-4xl font-bold tracking-tight leading-tight mb-4">Cook Like a Pro<br>With What You Have.</h2>
                    <p class="text-silver font-medium leading-relaxed">LetMeCook's AI analyzes your pantry and suggests chef-grade recipes in milliseconds.</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-6 bg-black/30 border border-white/10 rounded-3xl">
                        <h5 class="text-4xl font-bold text-amber">01</h5>
                        <p class="text-xs font-bold uppercase tracking-widest mt-2 text-silver">Pick</p>
                    </div>
                    <div class="p-6 bg-amber text-black rounded-3xl">
                        <h5 class="text-4xl font-bold">02</h5>
                        <p class="text-[10px] font-bold uppercase tracking-widest mt-2">Let AI Cook</p>
                    </div>
                    <div class="p-6 bg-white/5 border border-white/10 rounded-3xl">
                        <h5 class="text-4xl font-bold text-white">03</h5>
                        <p class="text-xs font-bold uppercase tracking-widest mt-2 text-silver">Enjoy</p>
                    </div>
                    <div class="p-6 bg-black/30 border border-white/10 rounded-3xl flex flex-col items-center justify-center">
                        <i class="fas fa-star text-2xl text-amber"></i>
                        <p class="text-[10px] font-bold uppercase tracking-widest mt-2 text-silver">Save Favorites</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
