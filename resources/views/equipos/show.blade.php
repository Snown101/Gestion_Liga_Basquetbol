<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-brand-light tracking-tight leading-tight flex items-center gap-2">
                {{ __('Ficha del Equipo') }}
            </h2>
            <a href="{{ route('equipos.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-light/80 hover:text-white transition-colors bg-brand-card px-4 py-2 rounded-xl border border-brand-border shadow-sm">
                &larr; Volver a Equipos
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-brand-bg min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-brand-card overflow-hidden shadow-2xl rounded-3xl border border-brand-border">
                
                {{-- Banner superior de la ficha --}}
                <div class="bg-gradient-to-r from-brand-bg via-brand-card to-brand-border/60 p-8 text-brand-light relative overflow-hidden border-b border-brand-border">
                    <div class="absolute -right-8 -bottom-8 opacity-10 text-brand-gold pointer-events-none">
                        <svg class="w-64 h-64 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm0 18a8 8 0 118-8 8.009 8.009 0 01-8 8z"/>
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <span class="inline-block bg-brand-gold text-brand-bg font-extrabold text-xs px-3.5 py-1 rounded-full uppercase tracking-wider mb-3 shadow-md">
                            Detalles del Equipo
                        </span>
                        <h3 class="text-3xl font-black tracking-tight text-white">
                            {{ $equipo->nombre }}
                        </h3>
                        <p class="text-brand-light/70 text-sm mt-1.5 flex items-center gap-1.5">
                            <span>Ciudad:</span> <strong class="text-brand-gold font-bold">{{ $equipo->ciudad ?? 'No registrada' }}</strong>
                        </p>
                    </div>
                </div>

                {{-- Contenido de detalles en cuadrícula --}}
                <div class="p-8 space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        
                        {{-- Entrenador --}}
                        <div class="bg-brand-bg/60 p-5 rounded-2xl border border-brand-border flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-brand-card border border-brand-gold/40 flex items-center justify-center text-brand-gold shadow-sm shrink-0">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-brand-gold uppercase tracking-wider">Entrenador</div>
                                <div class="text-brand-light font-bold text-base mt-0.5">
                                    {{ $equipo->entrenador ?? 'No registrado' }}
                                </div>
                            </div>
                        </div>

                        {{-- Año de fundación --}}
                        <div class="bg-brand-bg/60 p-5 rounded-2xl border border-brand-border flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-brand-card border border-brand-gold/40 flex items-center justify-center text-brand-gold shadow-sm shrink-0">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-brand-gold uppercase tracking-wider">Año de fundación</div>
                                <div class="text-brand-light font-bold text-base mt-0.5">
                                    @if($equipo->fundado)
                                        <span class="bg-brand-border text-brand-light px-3 py-0.5 rounded-md text-sm font-bold border border-brand-border/80">
                                            {{ $equipo->fundado }}
                                        </span>
                                    @else
                                        <span class="text-brand-light/50 font-normal">No registrado</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Barra de acciones --}}
                    <div class="pt-6 border-t border-brand-border flex items-center justify-between">
                        <a href="{{ route('equipos.index') }}" class="text-sm font-semibold text-brand-light/70 hover:text-brand-gold transition-colors">
                            Cancelar y volver
                        </a>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('equipos.edit', $equipo) }}" 
                               class="inline-flex items-center gap-2 bg-brand-gold hover:bg-brand-light text-brand-bg font-bold px-5 py-2.5 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                                Editar Equipo
                            </a>
                            
                            <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center gap-2 bg-red-950/40 text-red-400 hover:bg-red-900/60 hover:text-red-200 font-semibold px-5 py-2.5 rounded-xl border border-red-900/40 transition-colors text-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar este equipo?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>