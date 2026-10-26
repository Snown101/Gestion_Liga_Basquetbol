<section class="bg-[#19191a] p-8 rounded-3xl border border-[#373739] shadow-2xl">
    <header class="mb-6 pb-6 border-b border-[#373739]">
        <h2 class="text-xl font-bold text-[#ecdda2] tracking-tight">
            {{ __('Información del Perfil') }}
        </h2>

        <p class="mt-2 text-sm text-[#ecdda2]/70 leading-relaxed">
            {{ __('Actualiza la información del perfil de tu cuenta y la dirección de correo electrónico.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        {{-- Nombre --}}
        <div>
            <label for="name" class="block text-sm font-bold text-[#ecdda2] mb-2">
                {{ __('Nombre') }} <span class="text-[#c9b977]"></span>
            </label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] placeholder-[#ecdda2]/40 shadow-inner transition-all py-3 px-4 text-sm" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error class="mt-2 text-red-400 text-xs font-semibold" :messages="$errors->get('name')" />
        </div>

        {{-- Correo Electrónico --}}
        <div>
            <label for="email" class="block text-sm font-bold text-[#ecdda2] mb-2">
                {{ __('Correo Electrónico') }} <span class="text-[#c9b977]"></span>
            </label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="w-full rounded-xl border-[#373739] bg-[#020202] focus:bg-[#020202] focus:border-[#c9b977] focus:ring-2 focus:ring-[#c9b977]/20 text-[#ecdda2] placeholder-[#ecdda2]/40 shadow-inner transition-all py-3 px-4 text-sm" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username" 
            />
            <x-input-error class="mt-2 text-red-400 text-xs font-semibold" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 rounded-2xl bg-[#020202]/60 border border-[#373739]">
                    <p class="text-sm text-[#ecdda2]">
                        {{ __('Tu dirección de correo electrónico no está verificada.') }}
                    </p>

                    <button form="send-verification" class="mt-2 inline-flex items-center text-sm font-semibold text-[#c9b977] hover:text-[#ecdda2] underline transition-colors focus:outline-none">
                        {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-3 font-semibold text-sm text-emerald-400 flex items-center gap-1.5">
                            <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu correo electrónico.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Botón Guardar y Notificación --}}
        <div class="flex items-center gap-4 pt-6 border-t border-[#373739]">
            <button 
                type="submit" 
                class="inline-flex items-center gap-2 bg-[#c9b977] hover:bg-[#ecdda2] text-[#020202] font-bold px-6 py-2.5 rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                {{ __('Guardar') }}
            </button>

            @if (session('status') === 'profile-updated')
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