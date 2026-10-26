<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#ecdda2] tracking-tight leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-[#020202] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            {{-- Tarjeta: Actualizar Información de Perfil --}}
            <div class="bg-[#19191a] overflow-hidden shadow-2xl rounded-3xl border border-[#373739]">
                <div class="p-8 sm:p-10">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Tarjeta: Actualizar Contraseña --}}
            <div class="bg-[#19191a] overflow-hidden shadow-2xl rounded-3xl border border-[#373739]">
                <div class="p-8 sm:p-10">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Tarjeta: Eliminar Cuenta --}}
            <div class="bg-[#19191a] overflow-hidden shadow-2xl rounded-3xl border border-[#373739]">
                <div class="p-8 sm:p-10">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>