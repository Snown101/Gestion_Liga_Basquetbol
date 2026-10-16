<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Jugadores') }}
            </h2>
            <a href="{{ route('jugadores.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Nuevo Jugador
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
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Número</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Posición</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Equipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($jugadores as $jugador)
                                <tr>
                                    <td class="px-6 py-4">{{ $jugador->nombre }} {{ $jugador->apellido }}</td>
                                    <td class="px-6 py-4">{{ $jugador->numero ?? '-' }}</td>
                                    <td class="px-6 py-4">{{ $jugador->posicion ?? '-' }}</td>
                                    <td class="px-6 py-4">{{ $jugador->equipo->nombre ?? '-' }}</td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('jugadores.show', $jugador) }}" class="text-blue-600 hover:underline">Ver</a>
                                        <a href="{{ route('jugadores.edit', $jugador) }}" class="text-yellow-600 hover:underline">Editar</a>
                                        <form action="{{ route('jugadores.destroy', $jugador) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar este jugador?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        No hay jugadores registrados.
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