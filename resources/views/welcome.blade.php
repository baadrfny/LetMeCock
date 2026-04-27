<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-2">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-tr from-cyan-500 to-blue-600 rounded-lg shadow-[0_0_10px_rgba(6,182,212,0.5)]"></div>
                <h2 class="font-black text-xl text-white tracking-tighter">LET ME COOK</h2>
            </div>
            
            <div class="flex items-center gap-6">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-xs uppercase tracking-widest text-gray-400 hover:text-cyan-400 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-xs uppercase tracking-widest text-gray-400 hover:text-white transition">Login</a>
                    <a href="{{ route('register') }}" class="px-5 py-2 bg-white text-black text-xs font-bold uppercase rounded-full hover:bg-cyan-400 transition">Join Now</a>
                @endauth
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#020617] text-white font-sans selection:bg-cyan-500/30">
        
        <div class="relative pt-20 pb-32 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
                <span class="inline-block px-4 py-1 rounded-full border border-cyan-500/30 text-cyan-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-6">
                    AI Powered Gastronomy
                </span>
                <h1 class="text-6xl md:text-8xl font-black tracking-tighter mb-8 leading-none">
                    EMPTY FRIDGE? <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-600">NO PROBLEM.</span>
                </h1>
                
                <div class="max-w-2xl mx-auto mt-12">
                    <div class="group relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-orange-500 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                        <input type="text" 
                               placeholder="Type your ingredients... (Chicken, Lime, Garlic)" 
                               class="relative w-full bg-black border-none rounded-2xl py-6 px-8 text-xl focus:ring-2 focus:ring-cyan-500 transition-all placeholder-gray-700">
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-cyan-500/50">
                            <i class="fas fa-magic text-xl"></i>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-500 text-sm italic">Just start typing. The magic happens automatically.</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 pb-20">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h3 class="text-2xl font-bold">Recommended for You</h3>
                    <p class="text-gray-500">Based on your available ingredients</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                
                <div class="group relative">
                    <div class="relative aspect-[4/5] overflow-hidden rounded-[2rem] bg-gray-900 border border-white/5 transition-all duration-500 group-hover:border-cyan-500/50 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&q=80&w=800" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60"></div>
                        <div class="absolute top-6 right-6 flex flex-col gap-3">
                            <button class="w-12 h-12 bg-white/10 backdrop-blur-xl rounded-full flex items-center justify-center border border-white/20 hover:bg-red-500 transition-colors">
                                <i class="fas fa-heart text-white"></i>
                            </button>
                            <button class="w-12 h-12 bg-white/10 backdrop-blur-xl rounded-full flex items-center justify-center border border-white/20 hover:bg-cyan-500 transition-colors">
                                <i class="fas fa-plus text-white"></i>
                            </button>
                        </div>

                        <div class="absolute bottom-8 left-8 right-8">
                            <p class="text-cyan-400 text-[10px] font-bold uppercase tracking-widest mb-2">15 Min Prep</p>
                            <h4 class="text-2xl font-bold leading-tight">Mediterranean <br>Zen Bowl</h4>
                        </div>
                    </div>
                </div>

                <div class="group relative md:translate-y-12">
                    <div class="relative aspect-[4/5] overflow-hidden rounded-[2rem] bg-gray-900 border border-white/5 transition-all duration-500 group-hover:border-orange-500/50 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=800" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60"></div>
                        <div class="absolute top-6 right-6 flex flex-col gap-3">
                            <button class="w-12 h-12 bg-white/10 backdrop-blur-xl rounded-full flex items-center justify-center border border-white/20 hover:bg-red-500 transition-colors">
                                <i class="fas fa-heart text-white"></i>
                            </button>
                            <button class="w-12 h-12 bg-white/10 backdrop-blur-xl rounded-full flex items-center justify-center border border-white/20 hover:bg-orange-500 transition-colors">
                                <i class="fas fa-plus text-white"></i>
                            </button>
                        </div>

                        <div class="absolute bottom-8 left-8 right-8">
                            <p class="text-orange-500 text-[10px] font-bold uppercase tracking-widest mb-2">Top Rated</p>
                            <h4 class="text-2xl font-bold leading-tight">Smokey Garlic <br>Roasted Steak</h4>
                        </div>
                    </div>
                </div>

                <div class="group relative">
                    <div class="relative aspect-[4/5] overflow-hidden rounded-[2rem] bg-gray-900 border border-white/5 transition-all duration-500 group-hover:border-cyan-500/50 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1476718406336-bb5a9690ee2a?auto=format&fit=crop&q=80&w=800" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60"></div>
                        <div class="absolute top-6 right-6 flex flex-col gap-3">
                            <button class="w-12 h-12 bg-white/10 backdrop-blur-xl rounded-full flex items-center justify-center border border-white/20 hover:bg-red-500 transition-colors">
                                <i class="fas fa-heart text-white"></i>
                            </button>
                            <button class="w-12 h-12 bg-white/10 backdrop-blur-xl rounded-full flex items-center justify-center border border-white/20 hover:bg-cyan-500 transition-colors">
                                <i class="fas fa-plus text-white"></i>
                            </button>
                        </div>

                        <div class="absolute bottom-8 left-8 right-8">
                            <p class="text-cyan-400 text-[10px] font-bold uppercase tracking-widest mb-2">Vegetarian</p>
                            <h4 class="text-2xl font-bold leading-tight">Rustic Mushroom <br>& Thyme Soup</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="bg-white text-black py-24 mt-20">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="max-w-md">
                    <h2 class="text-5xl font-black tracking-tighter leading-none mb-6">COOK LIKE <br>A PRO WITH <br>WHAT YOU HAVE.</h2>
                    <p class="text-gray-600 font-medium">LetMeCook uses advanced AI to analyze your pantry and suggest chef-grade recipes in milliseconds. No waste, just taste.</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-8 border border-black/10 rounded-3xl">
                        <h5 class="font-black text-3xl">01</h5>
                        <p class="text-xs font-bold uppercase tracking-widest mt-2">Pick</p>
                    </div>
                    <div class="p-8 bg-black text-white rounded-3xl">
                        <h5 class="font-black text-3xl">02</h5>
                        <p class="text-[10px] font-bold uppercase tracking-widest mt-2">Let AI Cook</p>
                    </div>
                    <div class="p-8 bg-cyan-400 rounded-3xl">
                        <h5 class="font-black text-3xl text-white">03</h5>
                        <p class="text-xs font-bold uppercase tracking-widest mt-2">Enjoy</p>
                    </div>
                    <div class="p-8 border border-black/10 rounded-3xl">
                        <i class="fas fa-star text-2xl"></i>
                        <p class="text-[10px] font-bold uppercase tracking-widest mt-2">Save Favorites</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>