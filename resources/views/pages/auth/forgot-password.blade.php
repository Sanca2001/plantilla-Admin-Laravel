<x-layouts::auth :title="__('Forgot password')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Has olvidado tu contraseña')" :description="__('Introduce tu correo electrónico para recibir un enlace para restablecer tu contraseña.')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-6">
            @csrf

            <flux:field>
                <flux:label class="text-white"> Correo Electrónico </flux:label>
                <flux:input
                    name="email"
                    type="email"
                    required
                    autofocus
                    placeholder="email@example.com" />

            </flux:field>



            <flux:button type="submit" class="w-full border-none !text-white !bg-[#2463EB]" data-test="email-password-reset-link-button">
                {{ __('Enviar') }}
            </flux:button>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-white">
            <span>{{ __('¿Oh, retornar a?') }}</span>
            <flux:link class="text-white" :href="route('login')" wire:navigate>{{ __('Iniciar Sesión') }}</flux:link>
        </div>
    </div>
</x-layouts::auth>