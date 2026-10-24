<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 w-full">
            <h2 class="font-bold text-2xl text-brand-light tracking-tight leading-tight flex items-center gap-2">
                {{ __('Gestión de Equipos') }}
            </h2>
            
            <a href="{{ route('equipos.create') }}" 
               class="inline-flex items-center gap-2 bg-brand-gold hover:bg-brand-light text-brand-bg font-bold px-5 py-2.5 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                </svg>
                Nuevo Equipo
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-brand-bg min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            {{-- Alerta de éxito --}}
            @if(session('success'))
                <div class="flex items-center gap-3 bg-brand-card border border-brand-gold/60 text-brand-light px-5 py-4 rounded-2xl shadow-md">
                    <svg class="w-5 h-5 text-brand-gold shrink-0 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Contenedor de la Tabla --}}
            <div class="bg-brand-card overflow-hidden shadow-xl rounded-3xl border border-brand-border">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-brand-border">
                        <thead class="bg-brand-border/40">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-extrabold text-brand-gold uppercase tracking-wider">Equipo</th>
                                <th class="px-6 py-4 text-left text-xs font-extrabold text-brand-gold uppercase tracking-wider">Ciudad</th>
                                <th class="px-6 py-4 text-left text-xs font-extrabold text-brand-gold uppercase tracking-wider">Entrenador</th>
                                <th class="px-6 py-4 text-left text-xs font-extrabold text-brand-gold uppercase tracking-wider">Fundado</th>
                                <th class="px-6 py-4 text-right text-xs font-extrabold text-brand-gold uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-brand-border/60 bg-brand-card">
                            @forelse($equipos as $equipo)
                                <tr class="hover:bg-brand-border/30 transition-colors group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="font-bold text-base text-brand-light group-hover:text-white transition-colors">
                                                {{ $equipo->nombre }}
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-brand-light/80">
                                        {{ $equipo->ciudad ?? '-' }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-brand-light/80">
                                        {{ $equipo->entrenador ?? '-' }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1 rounded-md text-xs font-bold  text-brand-light">
                                            {{ $equipo->fundado ?? '-' }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('equipos.show', $equipo) }}" class="inline-flex items-center px-3 py-1.5 bg-brand-border/60 text-brand-light hover:bg-brand-border hover:text-white rounded-lg transition-colors border border-brand-border/80">
                                            Ver
                                        </a>
                                        <a href="{{ route('equipos.edit', $equipo) }}" class="inline-flex items-center px-3 py-1.5 bg-brand-gold/20 text-brand-gold hover:bg-brand-gold hover:text-brand-bg rounded-lg transition-colors font-semibold border border-brand-gold/40">
                                            Editar
                                        </a>
                                        <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-950/40 text-red-400 hover:bg-red-900/60 hover:text-red-200 rounded-lg transition-colors border border-red-900/40" onclick="return confirm('¿Estás seguro de eliminar este equipo?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 rounded-2xl bg-brand-border/40 text-brand-gold flex items-center justify-center mb-3 border border-brand-border">
                                                <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                                                    <path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm0 18a8 8 0 118-8 8.009 8.009 0 01-8 8z"/>
                                                </svg>
                                            </div>
                                            <p class="text-brand-light font-bold text-base">No hay equipos registrados todavía.</p>
                                            <p class="text-brand-light/60 text-sm mt-1">Comienza agregando el primer equipo de la liga.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>