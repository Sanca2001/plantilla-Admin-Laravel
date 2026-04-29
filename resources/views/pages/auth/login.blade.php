<x-layouts::auth :title="__('Log in')">

    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Inicia sesión en tu cuenta')" :description="__('Introduce tu correo electrónico y contraseña a continuación para iniciar sesión.')" />

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf
            <flux:field>
                <flux:label class="text-white">Correo electrónico</flux:label>

                <flux:input
                    name="email"
                    :value="old('email')"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com" />
            </flux:field>

            <div class="relative">
                <flux:field>
                    <flux:label class="text-white">Contraseña</flux:label>
                    <flux:input
                        name="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        placeholder="Contraseña"
                        viewable />
                </flux:field>


                @if (Route::has('password.request'))
                <flux:link class=" text-white absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                    {{ __('¿Olvidaste tu contraseña?') }}
                </flux:link>
                @endif
            </div>


            <flux:field variant="inline">
                <flux:checkbox name="remember" :checked="old('remember')" />
                <flux:label class="text-white">Recordar Sesión</flux:label>
            </flux:field>


            <div class="flex items-center justify-end">
                <flux:button type="submit" class="border-none !text-white  w-full !bg-[#2463EB] " data-test="login-button">
                    {{ __('ACCEDER') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
        <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-white dark:text-zinc-400">
            <span>{{ __('¿No tienes una cuenta?') }}</span>
            <flux:link class="text-white" :href="route('register')" wire:navigate>{{ __('Registrarse') }} </flux:link>
        </div>
        @endif
    </div>

</x-layouts::auth>