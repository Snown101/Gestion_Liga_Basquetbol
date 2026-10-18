<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detalle del Equipo') }}
            </h2>
            <a href="{{ route('equipos.index') }}" class="text-gray-600 hover:underline">
                ← Volver a Equipos
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Nombre</h3>
                        <p class="text-gray-900">{{ $equipo->nombre }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Ciudad</h3>
                        <p class="text-gray-900">{{ $equipo->ciudad ?? 'No registrada' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Entrenador</h3>
                        <p class="text-gray-900">{{ $equipo->entrenador ?? 'No registrado' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Año de fundación</h3>
                        <p class="text-gray-900">{{ $equipo->fundado ?? 'No registrado' }}</p>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <a href="{{ route('equipos.edit', $equipo) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Editar
                        </a>
                        <form action="{{ route('equipos.destroy', $equipo) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" 
                                    onclick="return confirm('¿Eliminar este equipo?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>