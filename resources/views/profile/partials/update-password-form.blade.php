<section class="bg-[#19191a] p-8 rounded-3xl border border-[#373739] shadow-2xl">
    <header class="mb-6 pb-6 border-b border-[#373739]">
        <h2 class="text-xl font-bold text-[#ecdda2] tracking-tight">
            {{ __('Actualizar Contraseña') }}
        </h2>

        <p class="mt-2 text-sm text-[#ecdda2]/70 leading-relaxed">
            {{ __('Asegúrate de que tu cuenta esté usando una contraseña larga y aleatoria para mantenerse segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        {{-- Contraseña Actual --}}
        <div>
            <label for="update_password_current_password" class="block text-sm font-bold text-[#ecdda2] mb-2">
                {{ __('Contraseña Actual') }} <span class="text-[#c9b977]"></span>
            </label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] placeholder-[#ecdda2]/40 shadow-inner transition-all py-3 px-4 text-sm" 
                autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-400 text-xs font-semibold" />
        </div>

        {{-- Nueva Contraseña --}}
        <div>
            <label for="update_password_password" class="block text-sm font-bold text-[#ecdda2] mb-2">
                {{ __('Nueva Contraseña') }} <span class="text-[#c9b977]"></span>
            </label>
            <input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] placeholder-[#ecdda2]/40 shadow-inner transition-all py-3 px-4 text-sm" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-400 text-xs font-semibold" />
        </div>

        {{-- Confirmar Contraseña --}}
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-bold text-[#ecdda2] mb-2">
                {{ __('Confirmar Contraseña') }} <span class="text-[#c9b977]"></span>
            </label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] placeholder-[#ecdda2]/40 shadow-inner transition-all py-3 px-4 text-sm" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-400 text-xs font-semibold" />
        </div>

        {{-- Botón Guardar y Notificación --}}
        <div class="flex items-center gap-4 pt-6 border-t border-[#373739]">
            <button 
                type="submit" 
                class="inline-flex items-center gap-2 bg-[#c9b977] hover:bg-[#ecdda2] text-[#020202] font-bold px-6 py-2.5 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                {{ __('Guardar') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-bold text-emerald-400 flex items-center gap-1.5"
                >
                    <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    {{ __('Guardado.') }}
                </p>
            @endif
        </div>
    </form>
</section>