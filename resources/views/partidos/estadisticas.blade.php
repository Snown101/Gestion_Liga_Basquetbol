<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#ecdda2] tracking-tight leading-tight">
            {{ __('Estadísticas y Resultados') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-[#020202] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Tabla de posiciones --}}
            <div class="bg-[#19191a] overflow-hidden shadow-2xl rounded-3xl border border-[#373739]">
                <div class="p-6 sm:p-8">
                    <div class="mb-6 pb-4 border-b border-[#373739]">
                        <h3 class="text-lg font-bold text-[#ecdda2]">Tabla de Posiciones</h3>
                        <p class="text-sm text-[#ecdda2]/60 mt-1">Rendimiento general de los equipos en la temporada.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-[#373739]">
                            <thead class="bg-[#373739]/40">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Equipo</th>
                                    <th class="px-6 py-4 text-center text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">PJ</th>
                                    <th class="px-6 py-4 text-center text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">G</th>
                                    <th class="px-6 py-4 text-center text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">P</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#373739]/60 bg-[#19191a]">
                                @forelse($estadisticasEquipos as $stat)
                                    <tr class="hover:bg-[#373739]/30 transition-colors">
                                        <td class="px-6 py-4 font-bold text-white text-sm">
                                            {{ $stat['equipo']->nombre }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-sm font-semibold text-[#ecdda2]">
                                            {{ $stat['jugados'] }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-sm font-bold text-emerald-400">
                                            {{ $stat['ganados'] }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-sm font-bold text-red-400">
                                            {{ $stat['perdidos'] }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center text-[#ecdda2]/60 text-sm">
                                            No hay datos de posiciones todavía.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Últimos resultados --}}
            <div class="bg-[#19191a] overflow-hidden shadow-2xl rounded-3xl border border-[#373739]">
                <div class="p-6 sm:p-8">
                    <div class="mb-6 pb-4 border-b border-[#373739]">
                        <h3 class="text-lg font-bold text-[#ecdda2]">Últimos Resultados</h3>
                        <p class="text-sm text-[#ecdda2]/60 mt-1">Historial de los partidos finalizados recientemente.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-[#373739]">
                            <thead class="bg-[#373739]/40">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-4 text-left text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Partido</th>
                                    <th class="px-6 py-4 text-center text-xs font-extrabold text-[#c9b977] uppercase tracking-wider">Resultado</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#373739]/60 bg-[#19191a]">
                                @forelse($partidosFinalizados as $partido)
                                    <tr class="hover:bg-[#373739]/30 transition-colors">
                                        <td class="px-6 py-4 text-sm text-[#ecdda2]/80 whitespace-nowrap">
                                            {{ $partido->fecha }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-white font-medium">
                                            <span class="font-bold">{{ $partido->equipoLocal->nombre }}</span> 
                                            <span class="text-[#c9b977] mx-2 font-semibold">VS</span> 
                                            <span class="font-bold">{{ $partido->equipoVisitante->nombre }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            <span class="inline-flex items-center px-3.5 py-1 rounded-xl bg-[#020202] border border-[#c9b977]/40 text-[#c9b977] font-black tracking-wider text-sm">
                                                {{ $partido->puntos_local }} - {{ $partido->puntos_visitante }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-12 text-center text-[#ecdda2]/60 text-sm">
                                            No hay partidos finalizados todavía.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>