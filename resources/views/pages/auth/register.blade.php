<x-layouts::auth :title="__('Register')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Crear una cuenta')" :description="__('Introduce tus datos a continuación para crear tu cuenta.')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
            @csrf


            <flux:field>
                <flux:label class="text-white"> Nombres </flux:label>

                <flux:input
                    name="name"
                    :value="old('name')"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    :placeholder="__('Nombres')" />
            </flux:field>

            <flux:field>
                <flux:label class="text-white"> Correo Electrónico </flux:label>
                <flux:input
                    name="email"
                    :value="old('email')"
                    type="email"
                    required
                    autocomplete="email"
                    placeholder="email@example.com" />
            </flux:field>

            <flux:field>
                <flux:label class="text-white"> Contraseña </flux:label>
                <flux:input
                    name="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Contraseña')"
                    viewable />

            </flux:field>


            <flux:field>
                <flux:label class="text-white"> Confirmar Contraseña </flux:label>

                <flux:input
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Confirmar Contraseña')"
                    viewable />

            </flux:field>



            <div class="flex items-center justify-end">
                <flux:button type="submit"  class=" border-none !text-white !bg-[#2463EB]  w-full" data-test="register-user-button">
                    {{ __('Crear Cuenta') }}
                </flux:button>
            </div>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-white dark:text-zinc-400">
            <span>{{ __('¿Ya tienes una cuenta?') }}</span>
            <flux:link class="text-white" :href="route('login')" wire:navigate>{{ __('Iniciar Sesión') }}</flux:link>
        </div>
    </div>
</x-layouts::auth>