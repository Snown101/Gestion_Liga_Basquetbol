<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-brand-light tracking-tight leading-tight flex items-center gap-2">
                {{ __('Editar Equipo: ') }} <span class="text-brand-gold font-extrabold">{{ $equipo->nombre }}</span>
            </h2>
            <a href="{{ route('equipos.index') }}" class="text-sm font-semibold text-brand-light/70 hover:text-brand-gold transition-colors">
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
                        <h3 class="text-lg font-bold text-brand-light">Actualizar Información</h3>
                        <p class="text-sm text-brand-light/60 mt-1">Modifica los datos del equipo según sea necesario.</p>
                    </div>

                    <form action="{{ route('equipos.update', $equipo) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Nombre --}}
                        <div>
                            <label class="block text-sm font-bold text-brand-light mb-2">
                                Nombre del equipo <span class="text-brand-gold">*</span>
                            </label>
                            <input type="text" name="nombre" value="{{ old('nombre', $equipo->nombre) }}" required placeholder="Ej. Los Titanes de Básquet"
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

                        {{-- Ciudad y Entrenador (Grid de 2 columnas) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-brand-light mb-2">Ciudad</label>
                                <input type="text" name="ciudad" value="{{ old('ciudad', $equipo->ciudad) }}" placeholder="Ej. Ciudad de México"
                                       class="w-full rounded-xl border-brand-border bg-brand-bg/80 focus:bg-brand-bg focus:border-brand-gold focus:ring-2 focus:ring-brand-gold/20 text-brand-light placeholder-brand-light/40 shadow-inner transition-all py-3 px-4 text-sm">
                                @error('ciudad')
                                    <p class="mt-1.5 text-xs font-semibold text-red-400 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-brand-light mb-2">Entrenador</label>
                                <input type="text" name="entrenador" value="{{ old('entrenador', $equipo->entrenador) }}" placeholder="Ej. Carlos Mendoza"
                                       class="w-full rounded-xl border-brand-border bg-brand-bg/80 focus:bg-brand-bg focus:border-brand-gold focus:ring-2 focus:ring-brand-gold/20 text-brand-light placeholder-brand-light/40 shadow-inner transition-all py-3 px-4 text-sm">
                                @error('entrenador')
                                    <p class="mt-1.5 text-xs font-semibold text-red-400 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Año de fundación --}}
                        <div>
                            <label class="block text-sm font-bold text-brand-light mb-2">Año de fundación</label>
                            <input type="number" name="fundado" value="{{ old('fundado', $equipo->fundado) }}" min="1900" max="{{ date('Y') }}" placeholder="Ej. 1995"
                                   class="w-full sm:w-1/2 rounded-xl border-brand-border bg-brand-bg/80 focus:bg-brand-bg focus:border-brand-gold focus:ring-2 focus:ring-brand-gold/20 text-brand-light placeholder-brand-light/40 shadow-inner transition-all py-3 px-4 text-sm">
                            @error('fundado')
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
                            <a href="{{ route('equipos.index') }}" 
                               class="px-5 py-2.5 rounded-xl border border-brand-border text-brand-light/80 hover:bg-brand-border hover:text-white font-semibold text-sm transition-colors">
                                Cancelar
                            </a>
                            
                            <button type="submit" 
                                    class="inline-flex items-center gap-2 bg-brand-gold hover:bg-brand-light text-brand-bg font-bold px-6 py-2.5 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                                <span>Actualizar Equipo</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>