<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-surface border border-white/10 rounded-xl font-bold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-surface-elevated focus:outline-none focus:ring-2 focus:ring-amber focus:ring-offset-2 focus:ring-offset-background disabled:opacity-25 transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
