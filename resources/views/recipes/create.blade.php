<x-app-layout>
    <div class="relative bg-black min-h-screen overflow-hidden text-white flex items-center justify-center py-20 px-6">

        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-cyan-600/10 rounded-full blur-[150px] z-0"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-orange-600/10 rounded-full blur-[180px] z-0"></div>

        <div class="relative z-10 w-full max-w-3xl">

            <div class="text-center mb-12">
                <h1 class="text-5xl font-black tracking-tighter uppercase mb-4">
                    Create New <span class="text-orange-500 italic">Recipe</span>
                </h1>
                <div class="h-1.5 w-24 bg-cyan-500 mx-auto rounded-full shadow-[0_0_15px_rgba(6,182,212,0.4)]"></div>
            </div>

            <div class="bg-gray-950/50 border border-white/10 backdrop-blur-2xl rounded-[3rem] p-10 md:p-16 shadow-2xl">
                <form action="{{ auth()->user()->role === 'admin' ? route('recipes.store') : route('my-recipes.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-[0.2em] text-gray-500 ml-2">Recipe Name</label>
                            <input type="text" name="name" required placeholder="Ex: Classic Pancake"
                                class="w-full bg-black/40 border-white/5 rounded-2xl py-4 px-6 text-white focus:border-orange-500/50 focus:ring-0 transition-all placeholder-gray-700">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-[0.2em] text-gray-500 ml-2">Category</label>
                            <div class="relative">
                                <select name="category_id" required
                                    class="w-full bg-black/40 border-white/5 rounded-2xl py-4 px-6 text-white focus:border-cyan-500/50 focus:ring-0 appearance-none transition-all cursor-pointer">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" class="bg-gray-900">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-gray-600 pointer-events-none text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-[0.2em] text-gray-500 ml-2">Description</label>
                        <textarea name="description" required rows="3" placeholder="Tell us the story..."
                            class="w-full bg-black/40 border-white/5 rounded-2xl py-4 px-6 text-white focus:border-orange-500/50 focus:ring-0 transition-all placeholder-gray-700"></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-[0.2em] text-gray-500 ml-2">Preparation Steps</label>
                        <textarea name="preparation_steps" required rows="5" placeholder="1. Mix ingredients...&#10;2. Cook on medium heat..."
                            class="w-full bg-black/40 border-white/5 rounded-2xl py-4 px-6 text-white focus:border-cyan-500/50 focus:ring-0 transition-all placeholder-gray-700"></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-[0.2em] text-gray-500 ml-2 italic">Recipe Content</label>
                        <button type="button" id="open-ingredients"
                            class="w-full group flex items-center justify-between bg-white/5 border border-white/10 hover:border-cyan-500/50 rounded-2xl p-4 transition-all">
                            <span class="text-sm font-bold text-gray-400 group-hover:text-cyan-400">Select Ingredients</span>
                            <i class="fas fa-plus-circle text-cyan-500"></i>
                        </button>
                    </div>

                    <div id="ingredients-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-6">
                        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" id="close-modal-overlay"></div>
                        <div class="relative bg-gray-900 border border-white/10 w-full max-w-2xl max-h-[80vh] overflow-y-auto rounded-[2.5rem] p-8 shadow-2xl">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-black uppercase text-orange-500">Available Ingredients</h3>
                                <button type="button" id="close-modal-btn" class="text-gray-500 hover:text-white">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @isset($ingredients)
                                @foreach($ingredients as $ingredient)
                                <div class="flex items-center gap-4 bg-black/40 p-4 rounded-xl border border-white/5">
                                    <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}" class="rounded text-orange-500">

                                    <span class="flex-1 text-sm">{{ $ingredient->name }}</span>

                                    <div class="flex gap-2">
                                        <input type="text" name="quantities[{{ $ingredient->id }}]" placeholder="Qty"
                                            class="w-16 bg-gray-900 border-none rounded-lg text-xs p-2 text-white">

                                        <select name="units[{{ $ingredient->id }}]"
                                            class="bg-gray-900 border-none rounded-lg text-xs p-2 text-white">
                                            <option value="g">g</option>
                                            <option value="kg">kg</option>
                                            <option value="ml">ml</option>
                                            <option value="pcs">pcs</option>
                                        </select>
                                    </div>
                                </div>
                                @endforeach
                                @endisset
                            </div>
                            <button type="button" id="confirm-ingredients" class="w-full mt-8 bg-cyan-500 text-black font-black py-4 rounded-xl hover:bg-cyan-400 transition-all uppercase tracking-widest text-xs">
                                Confirm Selection
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-[0.2em] text-gray-500 ml-2">Cook Time (Min)</label>
                            <input type="number" name="cook_time" required placeholder="20"
                                class="w-full bg-black/40 border-white/5 rounded-2xl py-4 px-6 text-white focus:border-orange-500/50">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-[0.2em] text-gray-500 ml-2">Country Origin</label>
                            <input type="text" name="country_origin" required placeholder="Ex: Morocco"
                                class="w-full bg-black/40 border-white/5 rounded-2xl py-4 px-6 text-white focus:border-cyan-500/50">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-[0.2em] text-gray-500 ml-2">YouTube Video URL</label>
                        <input type="url" name="video_url" placeholder="https://youtube.com/..."
                            class="w-full bg-black/40 border-white/5 rounded-2xl py-4 px-6 text-white focus:border-orange-500/50">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-[0.2em] text-gray-500 ml-2">Recipe Image</label>
                        <input type="file" name="image" required class="w-full cursor-pointer bg-black/40 border border-dashed border-white/10 rounded-2xl py-8 px-6 text-gray-500 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:bg-cyan-500 file:text-black">
                    </div>

                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-black font-black py-5 rounded-2xl shadow-[0_10px_40px_rgba(249,115,22,0.3)] transition-all uppercase tracking-widest text-sm">
                        Publish Recipe
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('ingredients-modal');
        const openBtn = document.getElementById('open-ingredients');
        const closeBtn = document.getElementById('close-modal-btn');
        const confirmBtn = document.getElementById('confirm-ingredients');
        const overlay = document.getElementById('close-modal-overlay');

        openBtn.onclick = (e) => {
            e.preventDefault();
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        const close = () => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        closeBtn.onclick = close;
        confirmBtn.onclick = close;
        overlay.onclick = close;
    </script>
</x-app-layout>