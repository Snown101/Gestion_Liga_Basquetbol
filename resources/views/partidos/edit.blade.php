<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Partido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('partidos.update', $partido) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Equipo Local *</label>
                            <select name="equipo_local_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('equipo_local_id') border-red-500 @enderror">
                                <option value="">Seleccionar equipo...</option>
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}" {{ old('equipo_local_id', $partido->equipo_local_id) == $equipo->id ? 'selected' : '' }}>
                                        {{ $equipo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('equipo_local_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Equipo Visitante *</label>
                            <select name="equipo_visitante_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('equipo_visitante_id') border-red-500 @enderror">
                                <option value="">Seleccionar equipo...</option>
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}" {{ old('equipo_visitante_id', $partido->equipo_visitante_id) == $equipo->id ? 'selected' : '' }}>
                                        {{ $equipo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('equipo_visitante_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Fecha *</label>
                            <input type="date" name="fecha" value="{{ old('fecha', $partido->fecha) }}" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('fecha') border-red-500 @enderror">
                            @error('fecha')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Hora</label>
                            <input type="time" name="hora" value="{{ old('hora', $partido->hora) }}" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Puntos Local</label>
                            <input type="number" name="puntos_local" value="{{ old('puntos_local', $partido->puntos_local) }}" min="0"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Puntos Visitante</label>
                            <input type="number" name="puntos_visitante" value="{{ old('puntos_visitante', $partido->puntos_visitante) }}" min="0"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Estado *</label>
                            <select name="estado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="Programado" {{ old('estado', $partido->estado) == 'Programado' ? 'selected' : '' }}>Programado</option>
                                <option value="En curso" {{ old('estado', $partido->estado) == 'En curso' ? 'selected' : '' }}>En curso</option>
                                <option value="Finalizado" {{ old('estado', $partido->estado) == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Actualizar Partido
                            </button>
                            <a href="{{ route('partidos.index') }}" class="text-gray-600 hover:underline">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>