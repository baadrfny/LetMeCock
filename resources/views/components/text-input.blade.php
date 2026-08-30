@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-white/10 bg-black/30 focus:border-amber/50 focus:ring-amber rounded-xl text-white shadow-inner placeholder-silver-muted']) }}>
