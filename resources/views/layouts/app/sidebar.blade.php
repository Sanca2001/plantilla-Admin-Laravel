<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800 antialiased">
    <flux:sidebar sticky collapsible class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">

        <!-- LOGO DEL SIDEBAR -->
        <flux:sidebar.header>
            <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
            <flux:sidebar.collapse class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
        </flux:sidebar.header>

        <!-- OPCIONES DE NAVEGACION DEL MENU -->
        <flux:sidebar.nav>
            <!-- INICIO -->
            <flux:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate> PANEL </flux:sidebar.item>

            <!-- CONFIGURACIÓNES -->
            <flux:sidebar.item icon="cog-6-tooth" :href="route('admin.ajustes.index')" :current="request()->routeIs('admin.ajustes.index')" wire:navigate> CONFIGURACIÓNES </flux:sidebar.item>

            <!-- DIVISOR -->
            <div class="mt-6 mb-2 px-3 text-[10px] font-bold text-zinc-400 dark:text-zinc-500 uppercase tracking-[0.1em] transition-opacity duration-300 flex items-center gap-2 group-data-[collapsed]:hidden">
                <span> ADMINSTRACIÓN </span>
                <div class="h-[1px] flex-1 bg-zinc-200 dark:bg-zinc-700/50"></div>
            </div>

            <!-- ROLES -->
            <flux:sidebar.item icon="user-group" :href="route('admin.roles.index')" :current="request()->routeIs('admin.roles.index')" wire:navigate> ROLES </flux:sidebar.item>

            <!-- USUARIOS -->
            <flux:sidebar.item icon="users" :href="route('admin.users.index')" :current="request()->routeIs('admin.users.index')" wire:navigate> USUARIOS </flux:sidebar.item>



        </flux:sidebar.nav>




        <flux:sidebar.spacer />

        <!-- MENU FOOTER DEL SIDEBAR -->
        <flux:sidebar.nav>
            <flux:sidebar.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repositorio') }}
            </flux:sidebar.item>

            <flux:sidebar.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentación') }}
            </flux:sidebar.item>
        </flux:sidebar.nav>

        <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->nombres" />
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile
                :initials="auth()->user()->initials()"
                icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <flux:avatar
                                :name="auth()->user()->nombres"
                                 />

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <flux:heading class="truncate">{{ auth()->user()->nombres }}</flux:heading>
                                <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                        {{ __('Ajustes') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item
                        as="button"
                        type="submit"
                        icon="arrow-right-start-on-rectangle"
                        class="w-full cursor-pointer"
                        data-test="logout-button">
                        {{ __('Cerrar Sesión') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}
    @persist('toast')
    <flux:toast.group>
        <flux:toast />
    </flux:toast.group>
    @endpersist

    @fluxScripts
</body>

</html>