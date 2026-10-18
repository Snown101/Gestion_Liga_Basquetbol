<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Partidos') }}
            </h2>
            <a href="{{ route('partidos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Nuevo Partido
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Local</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Visitante</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Resultado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($partidos as $partido)
                                <tr>
                                    <td class="px-6 py-4">
                                        {{ $partido->fecha }}
                                        @if($partido->hora)
                                            <br><span class="text-sm text-gray-500">{{ $partido->hora }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $partido->equipoLocal->nombre ?? '-' }}</td>
                                    <td class="px-6 py-4">{{ $partido->equipoVisitante->nombre ?? '-' }}</td>
                                    <td class="px-6 py-4">
                                        @if($partido->estado === 'Finalizado')
                                            <strong>{{ $partido->puntos_local }} - {{ $partido->puntos_visitante }}</strong>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs rounded
                                            @if($partido->estado === 'Finalizado') bg-green-100 text-green-800
                                            @elseif($partido->estado === 'En curso') bg-yellow-100 text-yellow-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ $partido->estado }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('partidos.show', $partido) }}" class="text-blue-600 hover:underline">Ver</a>
                                        <a href="{{ route('partidos.edit', $partido) }}" class="text-yellow-600 hover:underline">Editar</a>
                                        <form action="{{ route('partidos.destroy', $partido) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar este partido?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        No hay partidos registrados.
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