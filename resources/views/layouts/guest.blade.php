<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-white antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-background relative overflow-hidden">
            <div class="absolute -top-[20%] -right-[10%] w-[700px] h-[700px] bg-amber/10 rounded-full blur-[140px] pointer-events-none"></div>
            <div class="absolute -bottom-[20%] -left-[10%] w-[700px] h-[700px] bg-white/5 rounded-full blur-[140px] pointer-events-none"></div>

            <div class="relative mb-6">
                <a href="/" class="text-3xl font-bold tracking-tight text-white">
                    Let Me <span class="text-amber">Cook</span>
                </a>
            </div>

            <div class="relative w-full sm:max-w-md mt-6 px-6 py-8 bg-surface border border-white/10 shadow-[0_20px_60px_rgba(0,0,0,0.6)] overflow-hidden sm:rounded-3xl animate-fade-up">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
