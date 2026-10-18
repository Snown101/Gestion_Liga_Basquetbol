<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estadísticas y Resultados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Tabla de posiciones --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-bold mb-4">Tabla de Posiciones</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Equipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">PJ</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">G</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">P</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($estadisticasEquipos as $stat)
                                <tr>
                                    <td class="px-6 py-4 font-medium">{{ $stat['equipo']->nombre }}</td>
                                    <td class="px-6 py-4">{{ $stat['jugados'] }}</td>
                                    <td class="px-6 py-4 text-green-600">{{ $stat['ganados'] }}</td>
                                    <td class="px-6 py-4 text-red-600">{{ $stat['perdidos'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        No hay datos todavía.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Últimos resultados --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-bold mb-4">Últimos Resultados</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Partido</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Resultado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($partidosFinalizados as $partido)
                                <tr>
                                    <td class="px-6 py-4">{{ $partido->fecha }}</td>
                                    <td class="px-6 py-4">
                                        {{ $partido->equipoLocal->nombre }} vs {{ $partido->equipoVisitante->nombre }}
                                    </td>
                                    <td class="px-6 py-4 font-bold">
                                        {{ $partido->puntos_local }} - {{ $partido->puntos_visitante }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
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
</x-app-layout>