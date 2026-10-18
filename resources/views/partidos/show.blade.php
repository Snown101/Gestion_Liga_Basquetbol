<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detalle del Partido') }}
            </h2>
            <a href="{{ route('partidos.index') }}" class="text-gray-600 hover:underline">
                ← Volver a Partidos
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="text-center mb-8">
                        <div class="flex justify-center items-center gap-8 text-2xl font-bold">
                            <div>
                                <p class="text-gray-600 text-sm mb-1">Local</p>
                                <p>{{ $partido->equipoLocal->nombre ?? '-' }}</p>
                            </div>
                            <div class="text-4xl">
                                @if($partido->estado === 'Finalizado')
                                    {{ $partido->puntos_local }} - {{ $partido->puntos_visitante }}
                                @else
                                    vs
                                @endif
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm mb-1">Visitante</p>
                                <p>{{ $partido->equipoVisitante->nombre ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-bold text-gray-700">Fecha</h3>
                            <p class="text-gray-900">{{ $partido->fecha }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-gray-700">Hora</h3>
                            <p class="text-gray-900">{{ $partido->hora ?? 'No definida' }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-gray-700">Estado</h3>
                            <p class="text-gray-900">
                                <span class="px-2 py-1 text-sm rounded
                                    @if($partido->estado === 'Finalizado') bg-green-100 text-green-800
                                    @elseif($partido->estado === 'En curso') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $partido->estado }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('partidos.edit', $partido) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Editar
                        </a>
                        <form action="{{ route('partidos.destroy', $partido) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" 
                                    onclick="return confirm('¿Eliminar este partido?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>