<x-app-layout>
    <div class="relative bg-background min-h-screen overflow-hidden text-white py-20 px-6">

        <div class="absolute top-[-10%] left-[-5%] w-[600px] h-[600px] bg-amber/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[500px] h-[500px] bg-white/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="relative z-10 w-full max-w-4xl mx-auto">

            <div class="text-center mb-16 space-y-4 animate-fade-up">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber animate-pulse"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-amber">Recipe Studio</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight uppercase leading-none text-white">
                    Create New <span class="text-amber">Recipe</span>
                </h1>
                <p class="text-silver text-lg font-medium">Draft your culinary vision into the digital library.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 text-red-500 p-4 rounded-2xl mb-6">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-surface border border-white/10 rounded-[2.5rem] p-8 md:p-16 shadow-[0_20px_60px_rgba(0,0,0,0.5)]">
                <form id="recipe-form"
                    action="{{ auth()->user()->role === 'admin' ? route('recipes.store') : route('my-recipes.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-10">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="group space-y-3">
                            <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver ml-2 group-focus-within:text-amber transition-colors">Recipe Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ex: Midnight Ramen"
                                class="w-full bg-black/30 border-white/10 rounded-2xl py-5 px-8 text-white focus:border-amber/50 focus:ring-0 transition-all duration-300 ease-in-out placeholder-silver-muted text-lg font-bold shadow-inner">
                        </div>


                        <div class="group space-y-3">
                            <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver ml-2 group-focus-within:text-amber transition-colors">Category</label>
                            <div class="relative">
                                <select name="category_id" required
                                    class="w-full bg-black/30 border-white/10 rounded-2xl py-5 px-8 text-white focus:border-amber/50 focus:ring-0 appearance-none transition-all duration-300 ease-in-out cursor-pointer text-lg font-bold shadow-inner">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (string) old('category_id') === (string) $category->id ? 'selected' : '' }} class="bg-surface">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down absolute right-8 top-1/2 -translate-y-1/2 text-amber pointer-events-none"></i>
                            </div>
                        </div>
                    </div>

                    <div class="group space-y-3">
                        <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver ml-2 group-focus-within:text-amber transition-colors">The Narrative (Description)</label>
                        <textarea name="description" required rows="2" placeholder="Describe the soul of this dish..."
                            class="w-full bg-black/30 border-white/10 rounded-2xl py-5 px-8 text-white focus:border-amber/50 focus:ring-0 transition-all duration-300 ease-in-out placeholder-silver-muted text-lg font-medium shadow-inner italic">{{ old('description') }}</textarea>
                    </div>

                    <div class="space-y-4">
                        <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver ml-2 italic">Culinary Components</label>
                        <button type="button" id="open-ingredients"
                            class="w-full group flex items-center justify-between bg-white/5 border border-white/10 hover:border-amber/40 rounded-2xl p-6 transition-all duration-300 ease-in-out hover:bg-white/10">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-black/30 flex items-center justify-center text-amber group-hover:scale-110 transition-transform">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <span class="text-sm font-bold uppercase tracking-widest text-silver group-hover:text-amber transition-colors">Define Ingredients & Quantities</span>
                            </div>
                            <i class="fas fa-arrow-right text-silver-muted group-hover:text-amber transition-all group-hover:translate-x-1"></i>
                        </button>
                    </div>

                    <div class="group space-y-3">
                        <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver ml-2 group-focus-within:text-amber transition-colors">Preparation Protocol</label>
                        <textarea name="preparation_steps" required rows="6" placeholder="Step 1: The Foundation...&#10;Step 2: The Fusion..."
                            class="w-full bg-black/30 border-white/10 rounded-[2rem] py-8 px-8 text-white focus:border-amber/50 focus:ring-0 transition-all duration-300 ease-in-out placeholder-silver-muted text-lg font-medium shadow-inner leading-relaxed">{{ old('preparation_steps') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="group space-y-3">
                            <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver ml-2">Time Commitment (Min)</label>
                            <input type="number" name="cook_time" value="{{ old('cook_time') }}" required placeholder="45"
                                class="w-full bg-black/30 border-white/10 rounded-2xl py-5 px-8 text-white focus:border-amber/50 font-bold text-xl shadow-inner">
                        </div>
                        <div class="group space-y-3">
                            <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver ml-2">Geographic Origin</label>
                            <input type="text" name="country_origin" value="{{ old('country_origin') }}" required placeholder="Ex: Italy"
                                class="w-full bg-black/30 border-white/10 rounded-2xl py-5 px-8 text-white focus:border-amber/50 font-bold text-xl shadow-inner">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="group space-y-3">
                            <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver ml-2">Visual Asset (Image)</label>
                            <label class="relative flex flex-col items-center justify-center w-full h-32 bg-black/30 border-2 border-dashed border-white/15 rounded-2xl cursor-pointer hover:border-amber/50 transition-all duration-300 ease-in-out group">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fas fa-cloud-upload-alt text-amber mb-2 group-hover:scale-110 transition-transform"></i>
                                    <p class="text-[10px] font-bold text-silver-muted uppercase tracking-widest group-hover:text-amber">Upload Media</p>
                                </div>
                                <input type="file" name="image" required class="hidden" />
                            </label>
                        </div>
                        <div class="group space-y-3">
                            <label class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver ml-2">Video Reference (URL)</label>
                            <input type="url" name="video_url" value="{{ old('video_url') }}" placeholder="https://youtube.com/..."
                                class="w-full bg-black/30 border-white/10 rounded-2xl py-11 px-8 text-white focus:border-amber/50 font-medium text-sm shadow-inner">
                        </div>
                    </div>

                    <button type="submit" class="w-full group relative py-6 bg-amber hover:bg-amber-soft text-black font-bold text-xs uppercase tracking-[0.4em] rounded-2xl transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)] overflow-hidden">
                        <span class="relative z-10">Publish Masterpiece</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-amber to-amber-soft opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div id="ingredients-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-6">
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" id="close-modal-overlay"></div>
        <div class="relative bg-surface border border-white/10 w-full max-w-3xl max-h-[85vh] overflow-hidden rounded-[2rem] shadow-2xl flex flex-col">

            <div class="p-10 border-b border-white/10 flex justify-between items-center">
                <h3 class="text-2xl font-bold uppercase tracking-tight text-white">The <span class="text-amber">Pantry</span></h3>
                <button type="button" id="close-modal-btn" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-silver-muted hover:text-white transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-10 custom-scrollbar">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @isset($ingredients)
                    @foreach($ingredients as $ingredient)
                    <div class="group flex items-center gap-4 bg-black/30 p-5 rounded-2xl border border-white/10 hover:border-amber/30 transition-all duration-300 ease-in-out">
                        <input type="checkbox" form="recipe-form" name="ingredients[]" value="{{ $ingredient->id }}" {{ in_array($ingredient->id, old('ingredients', [])) ? 'checked' : '' }} class="w-5 h-5 rounded border-white/20 bg-black text-amber focus:ring-0 focus:ring-offset-0">

                        <div class="flex-1">
                            <span class="text-sm font-bold uppercase tracking-widest text-silver group-hover:text-white transition-colors">{{ $ingredient->name }}</span>
                        </div>

                        <div class="flex gap-2 shrink-0">
                            <input type="text" form="recipe-form" name="quantities[{{ $ingredient->id }}]" value="{{ old('quantities.' . $ingredient->id) }}" placeholder="Qty"
                                class="w-16 bg-surface border border-white/10 rounded-xl text-xs p-3 text-white focus:border-amber outline-none font-bold">

                            <select form="recipe-form" name="units[{{ $ingredient->id }}]"
                                class="bg-surface border border-white/10 rounded-xl text-[10px] p-3 text-silver-muted focus:text-amber focus:border-amber outline-none uppercase font-bold">
                                <option value="g" {{ old('units.' . $ingredient->id, 'pcs') === 'g' ? 'selected' : '' }}>g</option>
                                <option value="kg" {{ old('units.' . $ingredient->id, 'pcs') === 'kg' ? 'selected' : '' }}>kg</option>
                                <option value="ml" {{ old('units.' . $ingredient->id, 'pcs') === 'ml' ? 'selected' : '' }}>ml</option>
                                <option value="pcs" {{ old('units.' . $ingredient->id, 'pcs') === 'pcs' ? 'selected' : '' }}>pcs</option>
                                <option value="tbsp" {{ old('units.' . $ingredient->id, 'pcs') === 'tbsp' ? 'selected' : '' }}>tbsp</option>
                            </select>
                        </div>
                    </div>
                    @endforeach
                    @endisset
                </div>
            </div>

            <div class="p-10 bg-black/30 border-t border-white/10">
                <button type="button" id="confirm-ingredients" class="w-full bg-amber hover:bg-amber-soft text-black font-bold py-5 rounded-2xl transition-all duration-300 ease-in-out uppercase tracking-widest text-[10px]">
                    Lock In Selection
                </button>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255, 107, 0, 0.4); border-radius: 10px; }
    </style>

    <script>
        const modal = document.getElementById('ingredients-modal');
        const openBtn = document.getElementById('open-ingredients');
        const closeBtn = document.getElementById('close-modal-btn');
        const confirmBtn = document.getElementById('confirm-ingredients');
        const overlay = document.getElementById('close-modal-overlay');

        // Open and close modal
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

        // Core fix: Automatically link quantity to checkbox
        document.querySelectorAll('input[name^="quantities"]').forEach(input => {
            input.addEventListener('input', function() {
                // Extract ingredient ID from name (e.g., quantities[5] gives 5)
                const id = this.name.match(/\[(\d+)\]/)[1];
                const checkbox = document.querySelector(`input[name="ingredients[]"][value="${id}"]`);

                // If user types anything, check the box immediately
                if (this.value.trim() !== '') {
                    checkbox.checked = true;
                }
            });
        });
    </script>
</x-app-layout>
