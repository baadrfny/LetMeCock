<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-amber border border-transparent rounded-xl font-bold text-xs text-black uppercase tracking-widest hover:bg-amber-soft focus:bg-amber-soft active:bg-amber-deep focus:outline-none focus:ring-2 focus:ring-amber focus:ring-offset-2 focus:ring-offset-background transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
