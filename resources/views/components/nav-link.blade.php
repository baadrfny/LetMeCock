@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-amber text-sm font-bold leading-5 text-white focus:outline-none focus:border-amber transition duration-300 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-silver hover:text-white hover:border-amber/40 focus:outline-none focus:text-white focus:border-white/20 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
