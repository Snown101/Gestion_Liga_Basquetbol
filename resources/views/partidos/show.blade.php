<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-[#ecdda2] tracking-tight leading-tight">
                {{ __('Detalle del Partido') }}
            </h2>
            <a href="{{ route('partidos.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#ecdda2]/80 hover:text-white transition-colors bg-[#19191a] px-4 py-2 rounded-xl border border-[#373739] shadow-sm">
                &larr; Volver a Partidos
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-[#020202] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            {{-- Tarjeta Principal de Enfrentamiento --}}
            <div class="bg-[#19191a] overflow-hidden shadow-2xl rounded-3xl border border-[#373739] relative">
                
                {{-- Barra superior de estado --}}
                <div class="bg-[#020202]/80 px-8 py-4 border-b border-[#373739] flex items-center justify-between">
                    <span class="text-xs font-bold text-[#c9b977] uppercase tracking-wider">Información Oficial del Encuentro</span>
                    <span class="px-3.5 py-1 rounded-full text-xs font-extrabold uppercase tracking-wider border
                        @if($partido->estado === 'Finalizado') bg-emerald-950/40 text-emerald-400 border-emerald-900/50
                        @elseif($partido->estado === 'En curso') bg-amber-950/40 text-amber-400 border-amber-900/50
                        @else bg-[#373739]/60 text-[#ecdda2] border-[#373739]
                        @endif">
                        {{ $partido->estado }}
                    </span>
                </div>

                <div class="p-8 sm:p-10">
                    <div class="grid grid-cols-1 md:grid-cols-7 items-center gap-6 text-center">
                        
                        {{-- Equipo Local (Ocupa 3 columnas) --}}
                        <div class="md:col-span-3 bg-[#020202] p-6 rounded-2xl border border-[#373739] shadow-inner flex flex-col items-center">
                            <span class="text-[10px] font-extrabold text-[#c9b977] uppercase tracking-widest mb-2">Equipo Local</span>
                            <div class="w-14 h-14 rounded-xl bg-[#19191a] border border-[#c9b977]/30 flex items-center justify-center text-[#c9b977] font-black text-lg mb-3">
                                {{ strtoupper(substr($partido->equipoLocal->nombre ?? 'L', 0, 2)) }}
                            </div>
                            <h3 class="text-xl font-black text-white">
                                {{ $partido->equipoLocal->nombre ?? '-' }}
                            </h3>
                        </div>

                        {{-- VS / Marcador Central (Ocupa 1 columna) --}}
                        <div class="md:col-span-1 flex flex-col items-center justify-center my-2 md:my-0">
                            @if($partido->estado === 'Finalizado')
                                <div class="text-2xl font-black text-[#c9b977] tracking-wider bg-[#020202] px-4 py-3 rounded-2xl border border-[#c9b977]/30 shadow-inner w-full">
                                    {{ $partido->puntos_local }}<span class="text-[#373739] mx-1">-</span>{{ $partido->puntos_visitante }}
                                </div>
                            @else
                                <div class="w-12 h-12 rounded-full bg-[#373739]/40 border border-[#c9b977]/40 flex items-center justify-center text-[#c9b977] font-black text-sm shadow-md mx-auto">
                                    VS
                                </div>
                            @endif
                        </div>

                        {{-- Equipo Visitante (Ocupa 3 columnas) --}}
                        <div class="md:col-span-3 bg-[#020202] p-6 rounded-2xl border border-[#373739] shadow-inner flex flex-col items-center">
                            <span class="text-[10px] font-extrabold text-[#c9b977] uppercase tracking-widest mb-2">Equipo Visitante</span>
                            <div class="w-14 h-14 rounded-xl bg-[#19191a] border border-[#c9b977]/30 flex items-center justify-center text-[#c9b977] font-black text-lg mb-3">
                                {{ strtoupper(substr($partido->equipoVisitante->nombre ?? 'V', 0, 2)) }}
                            </div>
                            <h3 class="text-xl font-black text-white">
                                {{ $partido->equipoVisitante->nombre ?? '-' }}
                            </h3>
                        </div>

                    </div>

                    {{-- Detalles de Fecha y Hora en Bloques Inferiores --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8 pt-6 border-t border-[#373739]">
                        <div class="flex items-center gap-4 bg-[#020202]/60 p-4 rounded-xl border border-[#373739]">
                            <div class="w-10 h-10 rounded-lg bg-[#19191a] border border-[#c9b977]/30 flex items-center justify-center text-[#c9b977] shrink-0">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-[10px] font-bold text-[#c9b977] uppercase tracking-wider">Fecha Programada</div>
                                <div class="text-[#ecdda2] font-bold text-sm">{{ $partido->fecha }}</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 bg-[#020202]/60 p-4 rounded-xl border border-[#373739]">
                            <div class="w-10 h-10 rounded-lg bg-[#19191a] border border-[#c9b977]/30 flex items-center justify-center text-[#c9b977] shrink-0">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-[10px] font-bold text-[#c9b977] uppercase tracking-wider">Hora del Partido</div>
                                <div class="text-[#ecdda2] font-bold text-sm">{{ $partido->hora ?? 'No definida' }}</div>
                            </div>
                        </div>
                    </div>

                    {{-- Botones de Acción --}}
                    <div class="pt-6 border-t border-[#373739] mt-6 flex items-center justify-between">
                        <a href="{{ route('partidos.index') }}" class="text-sm font-semibold text-[#ecdda2]/70 hover:text-[#c9b977] transition-colors">
                            &larr; Volver al listado
                        </a>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('partidos.edit', $partido) }}" 
                               class="inline-flex items-center gap-2 bg-[#c9b977] hover:bg-[#ecdda2] text-[#020202] font-bold px-5 py-2.5 rounded-xl shadow-md transition-all text-sm">
                                Editar Partido
                            </a>
                            
                            <form action="{{ route('partidos.destroy', $partido) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center gap-2 bg-red-950/40 text-red-400 hover:bg-red-900/60 hover:text-red-200 font-semibold px-5 py-2.5 rounded-xl border border-red-900/40 transition-colors text-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar este partido?')">
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