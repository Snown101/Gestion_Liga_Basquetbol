<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-[#ecdda2] tracking-tight leading-tight">
                {{ __('Editar Jugador: ') }} <span class="text-[#c9b977] font-extrabold">{{ $jugador->nombre }} {{ $jugador->apellido }}</span>
            </h2>
            <a href="{{ route('jugadores.index') }}" class="text-sm font-semibold text-[#ecdda2]/70 hover:text-[#c9b977] transition-colors">
                &larr; Volver al listado
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-[#020202] min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-[#19191a] overflow-hidden shadow-2xl rounded-3xl border border-[#373739]">
                <div class="p-8 sm:p-10 text-[#ecdda2]">
                    
                    {{-- Encabezado del formulario --}}
                    <div class="mb-8 pb-6 border-b border-[#373739]">
                        <h3 class="text-lg font-bold text-[#ecdda2]">Actualizar Información del Atleta</h3>
                        <p class="text-sm text-[#ecdda2]/60 mt-1">Modifica los datos personales y deportivos del jugador.</p>
                    </div>

                    <form action="{{ route('jugadores.update', $jugador) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Nombre y Apellido (Grid de 2 columnas) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-[#ecdda2] mb-2">
                                    Nombre <span class="text-[#c9b977]">*</span>
                                </label>
                                <input type="text" name="nombre" value="{{ old('nombre', $jugador->nombre) }}" required placeholder="Ej. Juan"
                                       class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] placeholder-[#ecdda2]/40 shadow-inner transition-all py-3 px-4 text-sm">
                                @error('nombre')
                                    <p class="mt-1.5 text-xs font-semibold text-red-400 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-[#ecdda2] mb-2">
                                    Apellido <span class="text-[#c9b977]">*</span>
                                </label>
                                <input type="text" name="apellido" value="{{ old('apellido', $jugador->apellido) }}" required placeholder="Ej. Pérez"
                                       class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] placeholder-[#ecdda2]/40 shadow-inner transition-all py-3 px-4 text-sm">
                                @error('apellido')
                                    <p class="mt-1.5 text-xs font-semibold text-red-400 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Número y Posición (Grid de 2 columnas) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-[#ecdda2] mb-2">Número / Dorsal</label>
                                <input type="number" name="numero" value="{{ old('numero', $jugador->numero) }}" min="0" max="99" placeholder="Ej. 23"
                                       class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] placeholder-[#ecdda2]/40 shadow-inner transition-all py-3 px-4 text-sm">
                                @error('numero')
                                    <p class="mt-1.5 text-xs font-semibold text-red-400 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-[#ecdda2] mb-2">Posición</label>
                                <select name="posicion" class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] shadow-inner transition-all py-3 px-4 text-sm">
                                    <option value="" class="bg-[#19191a] text-[#ecdda2]/50">Seleccionar...</option>
                                    <option value="Base" class="bg-[#19191a] text-[#ecdda2]" {{ old('posicion', $jugador->posicion) == 'Base' ? 'selected' : '' }}>Base</option>
                                    <option value="Escolta" class="bg-[#19191a] text-[#ecdda2]" {{ old('posicion', $jugador->posicion) == 'Escolta' ? 'selected' : '' }}>Escolta</option>
                                    <option value="Alero" class="bg-[#19191a] text-[#ecdda2]" {{ old('posicion', $jugador->posicion) == 'Alero' ? 'selected' : '' }}>Alero</option>
                                    <option value="Ala-Pívot" class="bg-[#19191a] text-[#ecdda2]" {{ old('posicion', $jugador->posicion) == 'Ala-Pívot' ? 'selected' : '' }}>Ala-Pívot</option>
                                    <option value="Pívot" class="bg-[#19191a] text-[#ecdda2]" {{ old('posicion', $jugador->posicion) == 'Pívot' ? 'selected' : '' }}>Pívot</option>
                                </select>
                                @error('posicion')
                                    <p class="mt-1.5 text-xs font-semibold text-red-400 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Equipo --}}
                        <div>
                            <label class="block text-sm font-bold text-[#ecdda2] mb-2">
                                Equipo <span class="text-[#c9b977]">*</span>
                            </label>
                            <select name="equipo_id" class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] shadow-inner transition-all py-3 px-4 text-sm">
                                <option value="" class="bg-[#19191a] text-[#ecdda2]/50">Seleccionar equipo...</option>
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}" class="bg-[#19191a] text-[#ecdda2]" {{ old('equipo_id', $jugador->equipo_id) == $equipo->id ? 'selected' : '' }}>
                                        {{ $equipo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('equipo_id')
                                <p class="mt-1.5 text-xs font-semibold text-red-400 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Botones de acción --}}
                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-[#373739] mt-8">
                            <a href="{{ route('jugadores.index') }}" 
                               class="px-5 py-2.5 rounded-xl border border-[#373739] text-[#ecdda2]/80 hover:bg-[#373739] hover:text-white font-semibold text-sm transition-colors">
                                Cancelar
                            </a>
                            
                            <button type="submit" 
                                    class="inline-flex items-center gap-2 bg-[#c9b977] hover:bg-[#ecdda2] text-[#020202] font-bold px-6 py-2.5 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                                <span>Actualizar Jugador</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>