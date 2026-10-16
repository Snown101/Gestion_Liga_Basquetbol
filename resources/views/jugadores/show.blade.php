<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detalle del Jugador') }}
            </h2>
            <a href="{{ route('jugadores.index') }}" class="text-gray-600 hover:underline">
                ← Volver a Jugadores
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Nombre completo</h3>
                        <p class="text-gray-900">{{ $jugador->nombre }} {{ $jugador->apellido }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Número</h3>
                        <p class="text-gray-900">{{ $jugador->numero ?? 'No registrado' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Posición</h3>
                        <p class="text-gray-900">{{ $jugador->posicion ?? 'No registrada' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Equipo</h3>
                        <p class="text-gray-900">{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</p>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <a href="{{ route('jugadores.edit', $jugador) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Editar
                        </a>
                        <form action="{{ route('jugadores.destroy', $jugador) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" 
                                    onclick="return confirm('¿Eliminar este jugador?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>