<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LetMeCook') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-black text-white selection:bg-cyan-500/30">
        
        <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
            <div class="absolute -top-[10%] -left-[10%] w-[500px] h-[500px] bg-cyan-600/15 rounded-full blur-[120px]"></div>
            
            <div class="absolute -bottom-[10%] -right-[10%] w-[600px] h-[600px] bg-orange-600/30 rounded-full blur-[150px]"></div>
            
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-gray-950/20 z-[-1]"></div>
        </div>

        <div class="relative min-h-screen z-10 flex flex-col">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-gray-950/50 border-b border-white/5 backdrop-blur-xl sticky top-0 z-50">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="text-cyan-400 font-black tracking-widest uppercase text-sm italic">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <main class="flex-grow">
                {{ $slot }}
            </main>

            <footer class="py-10 text-center text-gray-600 text-xs border-t border-white/5 backdrop-blur-md">
                <p>&copy; {{ date('Y') }} LET ME COOK. Built for modern chefs.</p>
            </footer>
        </div>
    </body>
</html>