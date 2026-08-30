@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth];
@endphp

<div
    data-modal-name="{{ $name }}"
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50 {{ $show ? 'block' : 'hidden' }}"
    {{ $show ? '' : 'style="display: none;"' }}
>
    <div
        class="fixed inset-0 transform transition-all modal-overlay {{ $show ? 'block' : 'hidden' }}"
        {{ $show ? '' : 'style="display: none;"' }}
    >
        <div class="absolute inset-0 bg-black/70"></div>
    </div>

    <div
        class="mb-6 bg-surface border border-white/10 rounded-2xl overflow-hidden shadow-[0_30px_80px_rgba(0,0,0,0.8)] transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto {{ $show ? 'block' : 'hidden' }}"
        {{ $show ? '' : 'style="display: none;"' }}
    >
        {{ $slot }}
    </div>
</div>
