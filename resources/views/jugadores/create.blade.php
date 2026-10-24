<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-brand-light tracking-tight leading-tight flex items-center gap-2">
                {{ __('Registrar Nuevo Jugador') }}
            </h2>
            <a href="{{ route('jugadores.index') }}" class="text-sm font-semibold text-brand-light/70 hover:text-brand-gold transition-colors">
                &larr; Volver al listado
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-brand-bg min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-brand-card overflow-hidden shadow-2xl rounded-3xl border border-brand-border">
                <div class="p-8 sm:p-10 text-brand-light">
                    
                    {{-- Encabezado del formulario --}}
                    <div class="mb-8 pb-6 border-b border-brand-border">
                        <h3 class="text-lg font-bold text-brand-light">Información del Atleta</h3>
                        <p class="text-sm text-brand-light/60 mt-1">Completa los datos para registrar un nuevo jugador en la liga.</p>
                    </div>

                    <form action="{{ route('jugadores.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Nombre y Apellido (Grid de 2 columnas) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-brand-light mb-2">
                                    Nombre <span class="text-brand-gold"></span>
                                </label>
                                <input type="text" name="nombre" value="{{ old('nombre') }}" required placeholder="Ej. Juan"
                                       class="w-full rounded-xl border-brand-border bg-brand-bg/80 focus:bg-brand-bg focus:border-brand-gold focus:ring-2 focus:ring-brand-gold/20 text-brand-light placeholder-brand-light/40 shadow-inner transition-all py-3 px-4 text-sm">
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
                                <label class="block text-sm font-bold text-brand-light mb-2">
                                    Apellido <span class="text-brand-gold"></span>
                                </label>
                                <input type="text" name="apellido" value="{{ old('apellido') }}" required placeholder="Ej. Pérez"
                                       class="w-full rounded-xl border-brand-border bg-brand-bg/80 focus:bg-brand-bg focus:border-brand-gold focus:ring-2 focus:ring-brand-gold/20 text-brand-light placeholder-brand-light/40 shadow-inner transition-all py-3 px-4 text-sm">
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
                                <label class="block text-sm font-bold text-brand-light mb-2">Número / Dorsal</label>
                                <input type="number" name="numero" value="{{ old('numero') }}" min="0" max="99" placeholder="Ej. 23"
                                       class="w-full rounded-xl border-brand-border bg-brand-bg/80 focus:bg-brand-bg focus:border-brand-gold focus:ring-2 focus:ring-brand-gold/20 text-brand-light placeholder-brand-light/40 shadow-inner transition-all py-3 px-4 text-sm">
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
                                <label class="block text-sm font-bold text-brand-light mb-2">Posición</label>
                                <select name="posicion" class="w-full rounded-xl border-brand-border bg-brand-bg/80 focus:bg-brand-bg focus:border-brand-gold focus:ring-2 focus:ring-brand-gold/20 text-brand-light shadow-inner transition-all py-3 px-4 text-sm">
                                    <option value="" class="bg-brand-card text-brand-light/50">Seleccionar...</option>
                                    <option value="Base" class="bg-brand-card text-brand-light" {{ old('posicion') == 'Base' ? 'selected' : '' }}>Base</option>
                                    <option value="Escolta" class="bg-brand-card text-brand-light" {{ old('posicion') == 'Escolta' ? 'selected' : '' }}>Escolta</option>
                                    <option value="Alero" class="bg-brand-card text-brand-light" {{ old('posicion') == 'Alero' ? 'selected' : '' }}>Alero</option>
                                    <option value="Ala-Pívot" class="bg-brand-card text-brand-light" {{ old('posicion') == 'Ala-Pívot' ? 'selected' : '' }}>Ala-Pívot</option>
                                    <option value="Pívot" class="bg-brand-card text-brand-light" {{ old('posicion') == 'Pívot' ? 'selected' : '' }}>Pívot</option>
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
                            <label class="block text-sm font-bold text-brand-light mb-2">
                                Equipo <span class="text-brand-gold"></span>
                            </label>
                            <select name="equipo_id" class="w-full rounded-xl border-brand-border bg-brand-bg/80 focus:bg-brand-bg focus:border-brand-gold focus:ring-2 focus:ring-brand-gold/20 text-brand-light shadow-inner transition-all py-3 px-4 text-sm">
                                <option value="" class="bg-brand-card text-brand-light/50">Seleccionar equipo...</option>
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}" class="bg-brand-card text-brand-light" {{ old('equipo_id') == $equipo->id ? 'selected' : '' }}>
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
                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-brand-border mt-8">
                            <a href="{{ route('jugadores.index') }}" 
                               class="px-5 py-2.5 rounded-xl border border-brand-border text-brand-light/80 hover:bg-brand-border hover:text-white font-semibold text-sm transition-colors">
                                Cancelar
                            </a>
                            
                            <button type="submit" 
                                    class="inline-flex items-center gap-2 bg-brand-gold hover:bg-brand-light text-brand-bg font-bold px-6 py-2.5 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                                <span>Guardar Jugador</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>