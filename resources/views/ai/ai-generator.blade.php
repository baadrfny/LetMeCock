<x-app-layout>
    <div id="aiRoot" class="relative bg-background min-h-screen overflow-hidden text-white">

        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-amber/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[500px] h-[500px] bg-white/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-4xl mx-auto px-6 py-20 relative z-10">

            <div class="text-center mb-16 space-y-4 animate-fade-up relative">
                <div class="absolute top-0 right-0 flex items-center gap-2">
                    <span id="langBadge" class="text-[10px] font-bold uppercase tracking-widest text-silver-muted">EN</span>
                    <button id="langToggle" class="relative w-14 h-8 rounded-full bg-white/10 border border-white/10 transition-colors duration-300 focus:outline-none">
                        <span id="langKnob" class="absolute top-1 left-1 w-6 h-6 rounded-full bg-amber transition-transform duration-300 flex items-center justify-center text-[9px] font-bold text-black"></span>
                    </button>
                    <span id="langBadgeAr" class="text-[10px] font-bold uppercase tracking-widest text-amber">عربي</span>
                </div>

                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 mt-10">
                    <span class="w-2 h-2 rounded-full bg-amber animate-pulse"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-amber" data-en="Powered by Neural Chef" data-ar="مدعوم بذكاء الشيف">Powered by Neural Chef</span>
                </div>
                <h1 id="pageTitle" class="text-5xl md:text-6xl font-bold text-white tracking-tight leading-none" data-en="What's in your <span class=&quot;text-amber&quot;>Kitchen?</span>" data-ar="ماذا يوجد في <span class=&quot;text-amber&quot;>مطبخك؟</span>">
                    What's in your <span class="text-amber">Kitchen?</span>
                </h1>
                <p id="pageSubtitle" class="text-silver text-lg font-medium max-w-2xl mx-auto" data-en="Enter your available ingredients and let our AI architect a gourmet masterpiece for you." data-ar="أدخل مكوناتك المتوفرة ودع ذكاءنا الاصطناعي يبدع لك تحفة فنية فاخرة.">
                    Enter your available ingredients and let our AI architect a gourmet masterpiece for you.
                </p>
            </div>

            <div class="bg-surface border border-white/10 p-8 md:p-12 rounded-[2.5rem] shadow-[0_20px_60px_rgba(0,0,0,0.5)] relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-amber/10 blur-3xl rounded-full"></div>

                <div class="relative z-10 space-y-8">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-amber mb-4 ml-2" data-en="Available Ingredients" data-ar="المكونات المتوفرة">Available Ingredients</label>
                        <input type="text" id="ingredientsInput"
                               placeholder="e.g. Salmon, Asparagus, Lemon, Thyme..."
                               class="w-full p-6 bg-black/30 border border-white/10 rounded-2xl focus:border-amber/50 focus:ring-0 outline-none transition-all duration-300 ease-in-out text-white placeholder:text-silver-muted text-lg font-medium shadow-inner">
                    </div>

                    <button id="generateBtn" class="group relative w-full py-6 bg-amber hover:bg-amber-soft text-black font-bold text-xs uppercase tracking-[0.3em] rounded-2xl transition-all duration-300 ease-in-out shadow-[0_10px_30px_rgba(255,107,0,0.35)] overflow-hidden">
                        <span class="relative z-10" data-en="Generate Culinary Design" data-ar="توليد تصميم طهي">Generate Culinary Design</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-amber to-amber-soft opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </div>
            </div>

            <div id="loader" class="hidden text-center py-20">
                <div class="relative inline-block animate-pulse">
                    <div class="w-16 h-16 border-2 border-amber/20 border-t-amber rounded-full animate-spin"></div>
                    <i class="fas fa-robot absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-amber"></i>
                </div>
                <p id="loaderText" class="text-amber font-bold uppercase tracking-[0.3em] text-[10px] mt-6" data-en="Chef AI is architecting your recipe..." data-ar="شيف الذكاء الاصطناعي يبتكر وصفتك الآن...">Chef AI is architecting your recipe...</p>
            </div>

            <div id="recipeDisplay" class="hidden mt-12 bg-surface border border-white/10 p-10 md:p-16 rounded-[2.5rem] shadow-[0_20px_60px_rgba(0,0,0,0.5)] animate-fade-in">

                <div class="flex flex-wrap gap-3 mb-10">
                    <span id="display_difficulty" class="px-5 py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest bg-white/5 text-amber border border-white/10"></span>
                    <span id="display_country" class="px-5 py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest bg-white/5 text-white border border-white/10"></span>
                    <span id="display_time" class="px-5 py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest bg-black/30 text-silver border border-white/10"></span>
                </div>

                <h2 id="display_name" class="text-4xl md:text-5xl font-bold text-white tracking-tight mb-6 leading-none"></h2>

                <div class="relative mb-12">
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-amber to-transparent"></div>
                    <p id="display_desc" class="text-silver text-xl font-medium leading-relaxed italic pl-8"></p>
                </div>

                <div class="space-y-8">
                    <h3 class="text-[10px] font-bold uppercase tracking-[0.3em] text-silver flex items-center gap-4">
                        <span data-en="Execution Steps" data-ar="خطوات التحضير">Execution Steps</span> <span class="h-px bg-white/10 flex-grow"></span>
                    </h3>
                    <div id="display_steps" class="text-silver text-lg font-medium leading-relaxed whitespace-pre-line bg-black/30 p-8 md:p-12 rounded-[2rem] border border-white/10"></div>
                </div>

                <div class="mt-12 pt-12 border-t border-white/10 flex flex-wrap justify-center gap-6 items-center">
                    <button id="translateBtn" data-role="recipe-toggle" class="hidden group items-center gap-2 text-amber hover:text-amber-soft transition-colors text-[10px] font-bold uppercase tracking-widest border border-amber/30 hover:border-amber/60 rounded-xl px-6 py-3">
                        <i class="fas fa-language group-hover:scale-110 transition-transform"></i>
                        <span id="translateBtnLabel">Translate Recipe to عربي</span>
                    </button>
                    <button onclick="window.print()" class="text-silver hover:text-amber transition-colors text-[10px] font-bold uppercase tracking-widest flex items-center gap-2">
                        <i class="fas fa-print"></i> <span data-en="Save as PDF" data-ar="حفظ كملف PDF">Save as PDF</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let pageLang = 'en';
        let originalRecipe = null;
        let currentRecipe = null;
        let isArabic = false;

        const dirAttrs = ['pageTitle', 'pageSubtitle', 'display_steps', 'display_desc'];

        function setPageLanguage(lang) {
            pageLang = lang;
            const arabic = lang === 'ar';
            const root = document.getElementById('aiRoot');

            document.querySelectorAll('[data-en]').forEach((el) => {
                if (el.dataset.role === 'recipe-toggle') return;
                el.innerHTML = arabic ? el.dataset.ar : el.dataset.en;
            });

            if (root) root.dir = arabic ? 'rtl' : 'ltr';

            const input = document.getElementById('ingredientsInput');
            if (arabic) {
                input.placeholder = 'مثال: سلمون، هليون، ليمون، زعتر...';
                input.style.textAlign = 'right';
                document.getElementById('langKnob').style.transform = 'translateX(24px)';
                document.getElementById('langKnob').innerText = 'ع';
            } else {
                input.placeholder = 'e.g. Salmon, Asparagus, Lemon, Thyme...';
                input.style.textAlign = 'left';
                document.getElementById('langKnob').style.transform = 'translateX(0)';
                document.getElementById('langKnob').innerText = 'EN';
            }
        }

        document.getElementById('langToggle').addEventListener('click', () => {
            setPageLanguage(pageLang === 'en' ? 'ar' : 'en');
        });

        function renderRecipe(data) {
            document.getElementById('display_name').innerText = data.name;
            document.getElementById('display_desc').innerText = `"${data.description}"`;
            document.getElementById('display_steps').innerText = data.preparation_steps;
            document.getElementById('display_time').innerText = "⏱️ " + data.cook_time + " MIN";
            document.getElementById('display_difficulty').innerText = "🔥 " + data.difficulty;
            document.getElementById('display_country').innerText = "📍 " + data.country_origin;

            const arabic = isArabic || pageLang === 'ar';
            document.getElementById('display_steps').dir = arabic ? 'rtl' : 'ltr';
            document.getElementById('display_desc').dir = arabic ? 'rtl' : 'ltr';
            document.getElementById('display_name').dir = arabic ? 'rtl' : 'ltr';
        }

        document.getElementById('generateBtn').addEventListener('click', async () => {
            const input = document.getElementById('ingredientsInput').value;

            if (input.trim().length < 3) {
                alert('Please reveal your ingredients first.');
                return;
            }

            const loader = document.getElementById('loader');
            const display = document.getElementById('recipeDisplay');
            const btn = document.getElementById('generateBtn');
            const translateBtn = document.getElementById('translateBtn');

            loader.classList.remove('hidden');
            display.classList.add('hidden');
            btn.disabled = true;
            btn.classList.add('opacity-50', 'cursor-not-allowed');

            try {
                const response = await fetch('/ai/generate-guest', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ ingredients: input })
                });

                const data = await response.json();

                if (!response.ok || !data.name) {
                    throw new Error(data.message || 'The AI could not generate a recipe.');
                }

                originalRecipe = data;
                currentRecipe = data;
                isArabic = false;

                renderRecipe(data);

                loader.classList.add('hidden');
                display.classList.remove('hidden');
                translateBtn.classList.remove('hidden');
                translateBtn.classList.add('inline-flex');
            } catch (e) {
                alert('Neural Chef lost connection. Please make sure your Hugging Face API key is configured and try again.');
                loader.classList.add('hidden');
            } finally {
                btn.disabled = false;
                btn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        });

        document.getElementById('translateBtn').addEventListener('click', async () => {
            const translateBtn = document.getElementById('translateBtn');
            const label = document.getElementById('translateBtnLabel');
            const ar = pageLang === 'ar';

            if (isArabic) {
                renderRecipe(originalRecipe);
                label.innerText = ar ? 'ترجمة الوصفة إلى الإنجليزية' : 'Translate Recipe to عربي';
                isArabic = false;
                return;
            }

            translateBtn.disabled = true;
            label.innerText = ar ? 'جارٍ الترجمة...' : 'Translating...';

            try {
                const response = await fetch('/ai/translate-guest', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ recipe: currentRecipe })
                });

                const data = await response.json();

                if (!response.ok || !data.name) {
                    throw new Error(data.message || 'Translation failed.');
                }

                currentRecipe = data;
                isArabic = true;
                renderRecipe(data);

                label.innerText = ar ? 'عرض بالإنجليزية' : 'Show in English';
            } catch (e) {
                alert(ar ? 'فشلت الترجمة. حاول مرة أخرى.' : 'Translation failed. Please try again.');
            } finally {
                translateBtn.disabled = false;
            }
        });
    </script>
</x-app-layout>
