<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Jugador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('jugadores.update', $jugador) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nombre *</label>
                            <input type="text" name="nombre" value="{{ old('nombre', $jugador->nombre) }}" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nombre') border-red-500 @enderror">
                            @error('nombre')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Apellido *</label>
                            <input type="text" name="apellido" value="{{ old('apellido', $jugador->apellido) }}" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('apellido') border-red-500 @enderror">
                            @error('apellido')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Número</label>
                            <input type="number" name="numero" value="{{ old('numero', $jugador->numero) }}" min="0" max="99"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Posición</label>
                            <select name="posicion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Seleccionar...</option>
                                <option value="Base" {{ old('posicion', $jugador->posicion) == 'Base' ? 'selected' : '' }}>Base</option>
                                <option value="Escolta" {{ old('posicion', $jugador->posicion) == 'Escolta' ? 'selected' : '' }}>Escolta</option>
                                <option value="Alero" {{ old('posicion', $jugador->posicion) == 'Alero' ? 'selected' : '' }}>Alero</option>
                                <option value="Ala-Pívot" {{ old('posicion', $jugador->posicion) == 'Ala-Pívot' ? 'selected' : '' }}>Ala-Pívot</option>
                                <option value="Pívot" {{ old('posicion', $jugador->posicion) == 'Pívot' ? 'selected' : '' }}>Pívot</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Equipo *</label>
                            <select name="equipo_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('equipo_id') border-red-500 @enderror">
                                <option value="">Seleccionar equipo...</option>
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}" {{ old('equipo_id', $jugador->equipo_id) == $equipo->id ? 'selected' : '' }}>
                                        {{ $equipo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('equipo_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Actualizar Jugador
                            </button>
                            <a href="{{ route('jugadores.index') }}" class="text-gray-600 hover:underline">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>