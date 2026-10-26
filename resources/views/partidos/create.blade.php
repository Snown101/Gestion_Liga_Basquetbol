<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-[#ecdda2] tracking-tight leading-tight">
                {{ __('Registrar Nuevo Partido') }}
            </h2>
            <a href="{{ route('partidos.index') }}" class="text-sm font-semibold text-[#ecdda2]/70 hover:text-[#c9b977] transition-colors">
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
                        <h3 class="text-lg font-bold text-[#ecdda2]">Información del Encuentro</h3>
                        <p class="text-sm text-[#ecdda2]/60 mt-1">Completa los datos para programar un nuevo partido en la liga.</p>
                    </div>

                    <form action="{{ route('partidos.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Equipos (Grid de 2 columnas) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-[#ecdda2] mb-2">
                                    Equipo Local <span class="text-[#c9b977]">*</span>
                                </label>
                                <select name="equipo_local_id" class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] shadow-inner transition-all py-3 px-4 text-sm">
                                    <option value="" class="bg-[#19191a] text-[#ecdda2]/50">Seleccionar equipo...</option>
                                    @foreach($equipos as $equipo)
                                        <option value="{{ $equipo->id }}" class="bg-[#19191a] text-[#ecdda2]" {{ old('equipo_local_id') == $equipo->id ? 'selected' : '' }}>
                                            {{ $equipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('equipo_local_id')
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
                                    Equipo Visitante <span class="text-[#c9b977]">*</span>
                                </label>
                                <select name="equipo_visitante_id" class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] shadow-inner transition-all py-3 px-4 text-sm">
                                    <option value="" class="bg-[#19191a] text-[#ecdda2]/50">Seleccionar equipo...</option>
                                    @foreach($equipos as $equipo)
                                        <option value="{{ $equipo->id }}" class="bg-[#19191a] text-[#ecdda2]" {{ old('equipo_visitante_id') == $equipo->id ? 'selected' : '' }}>
                                            {{ $equipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('equipo_visitante_id')
                                    <p class="mt-1.5 text-xs font-semibold text-red-400 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Fecha y Hora (Grid de 2 columnas) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-[#ecdda2] mb-2">
                                    Fecha <span class="text-[#c9b977]">*</span>
                                </label>
                                <input type="date" name="fecha" value="{{ old('fecha') }}" 
                                       class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] shadow-inner transition-all py-3 px-4 text-sm">
                                @error('fecha')
                                    <p class="mt-1.5 text-xs font-semibold text-red-400 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-[#ecdda2] mb-2">Hora</label>
                                <input type="time" name="hora" value="{{ old('hora') }}" 
                                       class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] shadow-inner transition-all py-3 px-4 text-sm">
                            </div>
                        </div>

                        {{-- Estado --}}
                        <div>
                            <label class="block text-sm font-bold text-[#ecdda2] mb-2">
                                Estado <span class="text-[#c9b977]">*</span>
                            </label>
                            <select name="estado" class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] shadow-inner transition-all py-3 px-4 text-sm">
                                <option value="Programado" class="bg-[#19191a] text-[#ecdda2]" {{ old('estado', 'Programado') == 'Programado' ? 'selected' : '' }}>Programado</option>
                                <option value="En curso" class="bg-[#19191a] text-[#ecdda2]" {{ old('estado') == 'En curso' ? 'selected' : '' }}>En curso</option>
                                <option value="Finalizado" class="bg-[#19191a] text-[#ecdda2]" {{ old('estado') == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                            </select>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-[#373739] mt-8">
                            <a href="{{ route('partidos.index') }}" 
                               class="px-5 py-2.5 rounded-xl border border-[#373739] text-[#ecdda2]/80 hover:bg-[#373739] hover:text-white font-semibold text-sm transition-colors">
                                Cancelar
                            </a>
                            
                            <button type="submit" 
                                    class="inline-flex items-center gap-2 bg-[#c9b977] hover:bg-[#ecdda2] text-[#020202] font-bold px-6 py-2.5 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                                <span>Guardar Partido</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>