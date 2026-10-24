<nav x-data="{ open: false }" class="bg-brand-bg border-b border-brand-border shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group transition-transform duration-200 hover:scale-105">
                        <span class="font-black text-lg text-white tracking-tight hidden md:inline-block">
                            LIGA<span class="text-brand-gold">BÁSKET</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:flex items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-brand-gold text-brand-bg shadow-sm font-extrabold' : 'text-brand-light/80 hover:text-white hover:bg-brand-card' }}">
                        {{ __('Inicio') }}
                    </x-nav-link>

                    <x-nav-link :href="route('equipos.index')" :active="request()->routeIs('equipos.*')"
                        class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('equipos.*') ? 'bg-brand-gold text-brand-bg shadow-sm font-extrabold' : 'text-brand-light/80 hover:text-white hover:bg-brand-card' }}">
                        {{ __('Equipos') }}
                    </x-nav-link>

                    <x-nav-link :href="route('jugadores.index')" :active="request()->routeIs('jugadores.*')"
                        class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('jugadores.*') ? 'bg-brand-gold text-brand-bg shadow-sm font-extrabold' : 'text-brand-light/80 hover:text-white hover:bg-brand-card' }}">
                        {{ __('Jugadores') }}
                    </x-nav-link>

                    <x-nav-link :href="route('partidos.index')" :active="request()->routeIs('partidos.*')"
                        class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('partidos.*') ? 'bg-brand-gold text-brand-bg shadow-sm font-extrabold' : 'text-brand-light/80 hover:text-white hover:bg-brand-card' }}">
                        {{ __('Partidos') }}
                    </x-nav-link>

                    <x-nav-link :href="route('estadisticas')" :active="request()->routeIs('estadisticas')"
                        class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('estadisticas') ? 'bg-brand-gold text-brand-bg shadow-sm font-extrabold' : 'text-brand-light/80 hover:text-white hover:bg-brand-card' }}">
                        {{ __('Estadísticas') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2.5 px-3 py-1.5 border border-brand-border rounded-xl text-sm font-semibold text-brand-light bg-brand-card hover:bg-brand-border/60 hover:border-brand-gold/50 focus:outline-none transition-all duration-200 shadow-sm">
                            <div class="w-7 h-7 rounded-lg bg-brand-gold text-brand-bg flex items-center justify-center font-black text-xs">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="fill-current h-4 w-4 text-brand-light/70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-brand-card border border-brand-border rounded-xl overflow-hidden py-1">
                            <x-dropdown-link :href="route('profile.edit')" class="text-brand-gold hover:bg-brand-gold hover:text-brand-bg font-medium transition-colors">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="text-brand-light/80 hover:bg-brand-gold hover:text-brand-bg font-medium transition-colors"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Menú móvil) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-brand-light/70 hover:text-white hover:bg-brand-card focus:outline-none transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-brand-bg border-t border-brand-border">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl font-semibold text-brand-light">
                {{ __('Inicio') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('equipos.index')" :active="request()->routeIs('equipos.*')" class="rounded-xl font-semibold text-brand-light">
                {{ __('Equipos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('jugadores.index')" :active="request()->routeIs('jugadores.*')" class="rounded-xl font-semibold text-brand-light">
                {{ __('Jugadores') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('partidos.index')" :active="request()->routeIs('partidos.*')" class="rounded-xl font-semibold text-brand-light">
                {{ __('Partidos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('estadisticas')" :active="request()->routeIs('estadisticas')" class="rounded-xl font-semibold text-brand-light">
                {{ __('Estadísticas') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-brand-border px-4">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 rounded-xl bg-brand-gold text-brand-bg flex items-center justify-center font-black text-sm">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-bold text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-brand-light/60">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl font-medium text-brand-light">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="rounded-xl font-medium text-brand-light/70 hover:text-white"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>