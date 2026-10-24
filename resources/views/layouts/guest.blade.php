<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Liga de Básquetbol') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-brand-light bg-brand-bg selection:bg-brand-gold selection:text-brand-bg">
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-brand-bg">
            
            {{-- Luces decorativas desvanecidas en tonos dorados --}}
            <div class="absolute -top-24 -left-20 w-96 h-96 bg-brand-gold/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-20 w-96 h-96 bg-brand-border/30 rounded-full blur-3xl pointer-events-none"></div>

            {{-- Logo e Identidad de la Liga --}}
            <div class="text-center z-10 mb-8">
                <a href="/" class="inline-flex flex-col items-center gap-3 group transition-transform duration-300 hover:scale-105">
                    <div class="w-16 h-16 rounded-2xl bg-brand-card border border-brand-gold/40 flex items-center justify-center text-brand-gold shadow-xl shadow-black/50">
                        <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm6.93 6h-3.27a15.86 15.86 0 00-1.28-4.18A8.024 8.024 0 0118.93 8zM12 4.07c.88 1.13 1.63 2.5 2.18 3.93H9.82C10.37 6.57 11.12 5.2 12 4.07zM4.07 14A7.94 7.94 0 014 12c0-.69.1-1.36.27-2h3.42c-.06.66-.09 1.32-.09 2s.03 1.34.09 2zm1 2h3.27a15.86 15.86 0 001.28 4.18A8.024 8.024 0 015.07 16zm3.27-8H5.07a8.024 8.024 0 014.55-4.18A15.86 15.86 0 008.34 8zm3.66 11.93c-.88-1.13-1.63-2.5-2.18-3.93h4.36c-.55 1.43-1.3 2.8-2.18 3.93zM14.36 14H9.64c-.07-.66-.14-1.32-.14-2s.07-1.34.14-2h4.72c.07.66.14 1.32.14 2s-.07 1.34-.14 2zm1.3 5.93a15.86 15.86 0 001.28-4.18h3.27a8.024 8.024 0 01-4.55 4.18zM16.31 14c.06-.66.09-1.32.09-2s-.03-1.34-.09-2h3.42c.17.64.27 1.31.27 2s-.1 1.34-.27 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-white tracking-tight">
                            LIGA<span class="text-brand-gold">BÁSKET</span>
                        </h1>
                        <p class="text-xs font-medium text-brand-light/70 tracking-wider uppercase mt-0.5">
                            Sistema de Gestión Oficial
                        </p>
                    </div>
                </a>
            </div>

            {{-- Tarjeta contenedora de formularios --}}
            <div class="w-full sm:max-w-md bg-brand-card border border-brand-border shadow-2xl rounded-3xl p-8 z-10 text-brand-light">
                {{ $slot }}
            </div>

            {{-- Pie de página --}}
            <div class="mt-8 text-center text-xs text-brand-light/60 z-10">
                &copy; {{ date('Y') }} {{ config('app.name', 'Liga de Básquetbol') }}. Todos los derechos reservados.
            </div>
            
        </div>
    </body>
</html>