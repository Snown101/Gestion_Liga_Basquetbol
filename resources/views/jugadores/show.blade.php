<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-[#ecdda2] tracking-tight leading-tight">
                {{ __('Detalle del Jugador') }}
            </h2>
            <a href="{{ route('jugadores.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#ecdda2]/80 hover:text-white transition-colors bg-[#19191a] px-4 py-2 rounded-xl border border-[#373739] shadow-sm">
                &larr; Volver a Jugadores
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-[#020202] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-[#19191a] overflow-hidden shadow-2xl rounded-3xl border border-[#373739]">
                
                {{-- Banner superior con perfil del jugador --}}
                <div class="bg-[#020202] p-8 text-[#ecdda2] border-b border-[#373739]">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                        <div class="flex items-center gap-5">
                            <div class="w-16 h-16 rounded-2xl bg-[#373739] border border-[#c9b977]/50 flex items-center justify-center text-[#c9b977] font-black text-2xl shadow-xl shrink-0">
                                {{ strtoupper(substr($jugador->nombre, 0, 1)) }}{{ strtoupper(substr($jugador->apellido ?? '', 0, 1)) }}
                            </div>
                            <div>
                                <span class="inline-block bg-[#c9b977] text-[#020202] font-extrabold text-xs px-3.5 py-1 rounded-full uppercase tracking-wider mb-2 shadow-md">
                                    {{ $jugador->posicion ?? 'Atleta' }}
                                </span>
                                <h3 class="text-3xl font-black tracking-tight text-white">
                                    {{ $jugador->nombre }} {{ $jugador->apellido }}
                                </h3>
                                <p class="text-[#ecdda2]/70 text-sm mt-1">
                                    Equipo: <strong class="text-[#c9b977] font-bold">{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</strong>
                                </p>
                            </div>
                        </div>

                        {{-- Dorsal Grande --}}
                        @if($jugador->numero !== null)
                            <div class="px-6 py-3 rounded-2xl bg-[#19191a] border border-[#c9b977]/40 text-center shadow-inner self-start sm:self-center shrink-0">
                                <div class="text-[10px] font-extrabold text-[#c9b977] uppercase tracking-widest">DORSAL</div>
                                <div class="text-3xl font-black text-white tracking-wider">#{{ $jugador->numero }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Contenido de detalles en cuadrícula --}}
                <div class="p-8 space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        
                        {{-- Posición --}}
                        <div class="bg-[#020202] p-5 rounded-2xl border border-[#373739] flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-[#19191a] border border-[#c9b977]/40 flex items-center justify-center text-[#c9b977] shrink-0">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm0 18a8 8 0 118-8 8.009 8.009 0 01-8 8z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-[#c9b977] uppercase tracking-wider">Posición en Campo</div>
                                <div class="text-[#ecdda2] font-bold text-base mt-0.5">
                                    @if($jugador->posicion)
                                        <span class="bg-[#373739] text-[#ecdda2] px-3 py-0.5 rounded-md text-sm font-bold border border-[#373739]">
                                            {{ $jugador->posicion }}
                                        </span>
                                    @else
                                        <span class="text-[#ecdda2]/50 font-normal">No registrada</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Número / Dorsal --}}
                        <div class="bg-[#020202] p-5 rounded-2xl border border-[#373739] flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-[#19191a] border border-[#c9b977]/40 flex items-center justify-center text-[#c9b977] shrink-0">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14h-2v-4h2v4zm0-6h-2V7h2v4z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-[#c9b977] uppercase tracking-wider">Número de Camiseta</div>
                                <div class="text-[#ecdda2] font-bold text-base mt-0.5">
                                    {{ $jugador->numero !== null ? '#' . $jugador->numero : 'No registrado' }}
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Barra de acciones --}}
                    <div class="pt-6 border-t border-[#373739] flex items-center justify-between">
                        <a href="{{ route('jugadores.index') }}" class="text-sm font-semibold text-[#ecdda2]/70 hover:text-[#c9b977] transition-colors">
                            Cancelar y volver
                        </a>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('jugadores.edit', $jugador) }}" 
                               class="inline-flex items-center gap-2 bg-[#c9b977] hover:bg-[#ecdda2] text-[#020202] font-bold px-5 py-2.5 rounded-xl shadow-md transition-all text-sm">
                                Editar
                            </a>
                            
                            <form action="{{ route('jugadores.destroy', $jugador) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center gap-2 bg-red-950/40 text-red-400 hover:bg-red-900/60 hover:text-red-200 font-semibold px-5 py-2.5 rounded-xl border border-red-900/40 transition-colors text-sm"
                                        onclick="return confirm('¿Eliminar este jugador?')">
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