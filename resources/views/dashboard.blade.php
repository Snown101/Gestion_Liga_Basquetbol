<x-app-layout>
    <div class="py-10 bg-brand-bg min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Bienvenida con Banner de Contraste Iluminado --}}
            <div class="relative overflow-hidden bg-gradient-to-r from-brand-card via-brand-surface to-brand-purple border border-brand-purple/50 rounded-3xl shadow-2xl p-8 sm:p-10 text-brand-light">
                {{-- Brillo ambiental claro en la esquina --}}
                <div class="absolute -top-12 -right-12 w-64 h-64 bg-brand-light/10 rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="relative z-10 max-w-2xl">
                    <span class="inline-block bg-brand-light text-brand-bg font-extrabold text-xs px-3.5 py-1.5 rounded-full uppercase tracking-wider mb-4 shadow-md">
                        Panel de Administración
                    </span>
                    <h3 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                        ¡Bienvenido, <span class="text-brand-light underline decoration-brand-purple decoration-4 font-extrabold">{{ Auth::user()->name }}</span>!
                    </h3>
                    <p class="text-brand-light/90 mt-2 text-base font-medium leading-relaxed">
                        Sistema de gestión de la Liga de Básquetbol.
                    </p>
                </div>
            </div>

            {{-- Resumen rápido (Métricas con Tarjetas en Contraste Claro) --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                
                <!-- Tarjeta Equipos (Destacado Claro) -->
                <div class="bg-brand-light text-brand-bg rounded-2xl p-6 flex items-center justify-between shadow-xl border border-white/20 hover:scale-[1.02] transition-all duration-300 group">
                    <div>
                        <div class="text-brand-purple text-xs font-bold uppercase tracking-wider">Total Equipos</div>
                        <div class="text-4xl font-black text-brand-bg tracking-tight mt-1">{{ $totalEquipos }}</div>
                        <div class="text-brand-bg/70 text-xs font-semibold mt-1">Equipos registrados</div>
                    </div>
                </div>

                <!-- Tarjeta Jugadores -->
                <div class="bg-brand-light text-brand-bg rounded-2xl p-6 flex items-center justify-between shadow-xl border border-white/20 hover:scale-[1.02] transition-all duration-300 group">
                    <div>
                        <div class="text-brand-purple text-xs font-bold uppercase tracking-wider">Total Jugadores</div>
                        <div class="text-4xl font-black text-brand-bg tracking-tight mt-1">{{ $totalJugadores }}</div>
                        <div class="text-brand-bg/70 text-xs font-semibold mt-1">Atletas en la liga</div>
                    </div>
                </div>

                <!-- Tarjeta Partidos -->
                <div class="bg-brand-light text-brand-bg rounded-2xl p-6 flex items-center justify-between shadow-xl border border-white/20 hover:scale-[1.02] transition-all duration-300 group">
                    <div>
                        <div class="text-brand-purple text-xs font-bold uppercase tracking-wider">Total Partidos</div>
                        <div class="text-4xl font-black text-brand-bg tracking-tight mt-1">{{ $totalPartidos }}</div>
                        <div class="text-brand-bg/70 text-xs font-semibold mt-1">Encuentros disputados</div>
                    </div>
                </div>

            </div>

            {{-- Accesos Rápidos con Iconos Destacados --}}
            <div>
                <h4 class="text-xs font-extrabold text-brand-light uppercase tracking-widest mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-brand-purple inline-block"></span> Accesos Directos
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    <a href="{{ route('equipos.index') }}" class="group bg-brand-card border border-brand-surface hover:border-brand-light/50 rounded-2xl p-6 text-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-14 h-14 mx-auto bg-brand-light text-brand-bg rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:bg-brand-purple group-hover:text-brand-light transition-colors duration-300">
                            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm0 18a8 8 0 118-8 8.009 8.009 0 01-8 8z"/>
                            </svg>
                        </div>
                        <div class="font-bold text-brand-light text-lg">Equipos</div>
                        <div class="text-brand-light/60 text-xs mt-1">Gestionar planteles</div>
                    </a>

                    <a href="{{ route('jugadores.index') }}" class="group bg-brand-card border border-brand-surface hover:border-brand-light/50 rounded-2xl p-6 text-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-14 h-14 mx-auto bg-brand-light text-brand-bg rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:bg-brand-purple group-hover:text-brand-light transition-colors duration-300">
                            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <div class="font-bold text-brand-light text-lg">Jugadores</div>
                        <div class="text-brand-light/60 text-xs mt-1">Gestionar atletas</div>
                    </a>

                    <a href="{{ route('partidos.index') }}" class="group bg-brand-card border border-brand-surface hover:border-brand-light/50 rounded-2xl p-6 text-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-14 h-14 mx-auto bg-brand-light text-brand-bg rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:bg-brand-purple group-hover:text-brand-light transition-colors duration-300">
                            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                                <path d="M19 5h-2V3H7v2H5c-1.1 0-2 .9-2 2v1c0 2.55 1.92 4.63 4.4 4.94A5.996 5.996 0 0011 17v3H8v2h8v-2h-3v-3a5.996 5.996 0 003.6-4.06C19.08 10.63 21 8.55 21 6V5h-2zM5 7h2v3c0 1.65-1.35 3-3 3V7zm14 3c0-1.65-1.35-3-3-3v6c1.65 0 3-1.35 3-3z"/>
                            </svg>
                        </div>
                        <div class="font-bold text-brand-light text-lg">Partidos</div>
                        <div class="text-brand-light/60 text-xs mt-1">Registrar marcadores</div>
                    </a>

                    <a href="{{ route('estadisticas') }}" class="group bg-brand-card border border-brand-surface hover:border-brand-light/50 rounded-2xl p-6 text-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-14 h-14 mx-auto bg-brand-light text-brand-bg rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:bg-brand-purple group-hover:text-brand-light transition-colors duration-300">
                            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                            </svg>
                        </div>
                        <div class="font-bold text-brand-light text-lg">Estadísticas</div>
                        <div class="text-brand-light/60 text-xs mt-1">Ver resultados y tablas</div>
                    </a>

                </div>
            </div>

            {{-- Últimos partidos con contenedor claro en marcadores --}}
            <div class="bg-brand-card border border-brand-surface overflow-hidden shadow-xl rounded-3xl">
                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-brand-light flex items-center gap-2">
                            Últimos Partidos Jugados
                        </h3>
                        <a href="{{ route('partidos.index') }}" class="text-sm font-semibold text-brand-light bg-brand-purple px-4 py-1.5 rounded-xl hover:bg-brand-surface border border-brand-purple transition-all">
                            Ver todos &rarr;
                        </a>
                    </div>

                    @if($ultimosPartidos->count() > 0)
                        <div class="space-y-3">
                            @foreach($ultimosPartidos as $partido)
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-brand-surface/60 hover:bg-brand-surface transition-colors p-4 rounded-2xl border border-brand-surface gap-4">
                                    <div>
                                        <div class="font-bold text-brand-light text-base flex items-center gap-2">
                                            <span>{{ $partido->equipoLocal->nombre ?? 'Local' }}</span>
                                            <span class="text-xs font-extrabold uppercase px-2.5 py-0.5 bg-brand-purple text-brand-light rounded-md">vs</span>
                                            <span>{{ $partido->equipoVisitante->nombre ?? 'Visitante' }}</span>
                                        </div>
                                        <div class="text-xs font-medium text-brand-light/60 mt-1">
                                            {{ $partido->fecha }}
                                        </div>
                                    </div>
                                    
                                    {{-- Marcador con fondo claro brillante --}}
                                    <div class="flex items-center gap-3 self-end sm:self-center">
                                        <div class="px-5 py-2 bg-brand-light text-brand-bg rounded-xl font-black text-xl tracking-wider shadow-md">
                                            <span class="{{ $partido->puntos_local > $partido->puntos_visitante ? 'text-brand-purple' : 'text-brand-bg' }}">{{ $partido->puntos_local }}</span>
                                            <span class="text-brand-bg/40 mx-1">-</span>
                                            <span class="{{ $partido->puntos_visitante > $partido->puntos_local ? 'text-brand-purple' : 'text-brand-bg' }}">{{ $partido->puntos_visitante }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10 bg-brand-surface/30 rounded-2xl border border-dashed border-brand-surface">
                            <p class="text-brand-light/60 text-sm font-medium">
                                Aún no hay partidos finalizados registrados.
                            </p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>