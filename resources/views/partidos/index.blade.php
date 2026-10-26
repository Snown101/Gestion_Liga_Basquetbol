<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 w-full">
            <h2 class="font-bold text-2xl text-[#ecdda2] tracking-tight leading-tight">
                {{ __('Gestión de Partidos') }}
            </h2>
            
            <a href="{{ route('partidos.create') }}" 
               class="inline-flex items-center gap-2 bg-[#c9b977] hover:bg-[#ecdda2] text-[#020202] font-bold px-5 py-2.5 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                </svg>
                Nuevo Partido
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-[#020202] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            {{-- Alerta de éxito --}}
            @if(session('success'))
                <div class="flex items-center gap-3 bg-[#19191a] border border-[#c9b977]/60 text-[#ecdda2] px-5 py-4 rounded-2xl shadow-md">
                    <svg class="w-5 h-5 text-[#c9b977] shrink-0 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Contenedor de la Tabla --}}
            <div class="bg-[#19191a] overflow-hidden shadow-xl rounded-3xl border border-[#373739]">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#373739]">
                        <thead class="bg-[#373739]/40">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Fecha / Hora</th>
                                <th class="px-6 py-4 text-left text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Local</th>
                                <th class="px-6 py-4 text-left text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Visitante</th>
                                <th class="px-6 py-4 text-center text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Resultado</th>
                                <th class="px-6 py-4 text-left text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-4 text-right text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#373739]/60 bg-[#19191a]">
                            @forelse($partidos as $partido)
                                <tr class="hover:bg-[#373739]/30 transition-colors group">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#ecdda2]">
                                        <div class="font-bold">{{ $partido->fecha }}</div>
                                        @if($partido->hora)
                                            <div class="text-xs text-[#ecdda2]/60 mt-0.5">{{ $partido->hora }}</div>
                                        @endif
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-white">
                                        {{ $partido->equipoLocal->nombre ?? '-' }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-white">
                                        {{ $partido->equipoVisitante->nombre ?? '-' }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        @if($partido->estado === 'Finalizado')
                                            <span class="inline-flex items-center px-3 py-1 rounded-xl bg-[#020202] border border-[#c9b977]/40 text-[#c9b977] font-black tracking-wider">
                                                {{ $partido->puntos_local }} - {{ $partido->puntos_visitante }}
                                            </span>
                                        @else
                                            <span class="text-[#ecdda2]/40">-</span>
                                        @endif
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1 rounded-md text-xs font-bold border 
                                            @if($partido->estado === 'Finalizado') bg-emerald-950/40 text-emerald-400 border-emerald-900/50
                                            @elseif($partido->estado === 'En curso') bg-amber-950/40 text-amber-400 border-amber-900/50
                                            @else bg-[#373739]/60 text-[#ecdda2] border-[#373739]
                                            @endif">
                                            {{ $partido->estado }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('partidos.show', $partido) }}" class="inline-flex items-center px-3 py-1.5 bg-[#373739]/60 text-[#ecdda2] hover:bg-[#373739] hover:text-white rounded-lg transition-colors border border-[#373739]">
                                            Ver
                                        </a>
                                        <a href="{{ route('partidos.edit', $partido) }}" class="inline-flex items-center px-3 py-1.5 bg-[#c9b977]/20 text-[#c9b977] hover:bg-[#c9b977] hover:text-[#020202] rounded-lg transition-colors font-semibold border border-[#c9b977]/40">
                                            Editar
                                        </a>
                                        <form action="{{ route('partidos.destroy', $partido) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-950/40 text-red-400 hover:bg-red-900/60 hover:text-red-200 rounded-lg transition-colors border border-red-900/40" onclick="return confirm('¿Estás seguro de eliminar este partido?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 rounded-2xl bg-[#373739]/40 text-[#c9b977] flex items-center justify-center mb-3 border border-[#373739]">
                                                <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                                                    <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/>
                                                </svg>
                                            </div>
                                            <p class="text-[#ecdda2] font-bold text-base">No hay partidos registrados todavía.</p>
                                            <p class="text-[#ecdda2]/60 text-sm mt-1">Comienza programando el primer encuentro de la liga.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>