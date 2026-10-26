<section class="space-y-6">
    <header class="bg-[#19191a] p-8 rounded-3xl border border-[#373739] shadow-2xl">
        <h2 class="text-xl font-bold text-[#ecdda2] tracking-tight">
            {{ __('Eliminar Cuenta') }}
        </h2>

        <p class="mt-2 text-sm text-[#ecdda2]/70 leading-relaxed">
            {{ __('Una vez que tu cuenta sea eliminada, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar tu cuenta, por favor descarga cualquier dato o información que desees conservar.') }}
        </p>

        <div class="mt-6">
            <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="bg-red-950/60 hover:bg-red-900/80 text-red-200 border border-red-900/50 font-bold px-5 py-2.5 rounded-xl transition-all shadow-md text-sm"
            >{{ __('Eliminar Cuenta') }}</x-danger-button>
        </div>
    </header>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-[#19191a] text-[#ecdda2] rounded-3xl border border-[#373739]">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-white tracking-tight">
                {{ __('¿Estás seguro de que deseas eliminar tu cuenta?') }}
            </h2>

            <p class="mt-2 text-sm text-[#ecdda2]/70 leading-relaxed">
                {{ __('Una vez que tu cuenta sea eliminada, todos sus recursos y datos se eliminarán permanentemente. Por favor ingresa tu contraseña para confirmar que deseas eliminar permanentemente tu cuenta.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] placeholder-[#ecdda2]/40 shadow-inner transition-all py-3 px-4 text-sm"
                    placeholder="{{ __('Contraseña') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-400 text-xs font-semibold" />
            </div>

            <div class="mt-8 flex justify-end gap-4 pt-6 border-t border-[#373739]">
                <button type="button" x-on:click="$dispatch('close')" class="px-5 py-2.5 rounded-xl border border-[#373739] text-[#ecdda2]/80 hover:bg-[#373739] hover:text-white font-semibold text-sm transition-colors">
                    {{ __('Cancelar') }}
                </button>

                <button type="submit" class="inline-flex items-center gap-2 bg-red-950/60 hover:bg-red-900/80 text-red-200 font-bold px-6 py-2.5 rounded-xl border border-red-900/50 shadow-md transition-all text-sm">
                    {{ __('Eliminar Cuenta') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>