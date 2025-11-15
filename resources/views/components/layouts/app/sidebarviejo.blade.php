<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " data-theme="winter">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>
        
        {{-- INICIO --}}
        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Inicio')" class="grid">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                    wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        {{-- FORMULARIOS --}}
        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Formularios')" class="grid">
                <flux:navlist.item icon="document-text" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Formularios') }}
                </flux:navlist.item>

                <flux:navlist.item icon="clipboard-document-list" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Mis formularios') }}
                </flux:navlist.item>

                <flux:navlist.item icon="chat-bubble-bottom-center-text" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Respuestas') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        {{-- TIQUETES --}}
        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Tiquetes')" class="grid">
                <flux:navlist.item icon="ticket" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Abiertos') }}
                </flux:navlist.item>

                <flux:navlist.item icon="archive-box" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Cerrados') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        {{-- REPORTES --}}
        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Reportes')" class="grid">
                <flux:navlist.item icon="chart-bar" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Gráficos y Reportes') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        {{-- ROLES --}}
        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Roles')" class="grid">
                <flux:navlist.item icon="shield-check" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Roles y Permisos') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        {{-- USUARIOS --}}
        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Usuarios')" class="grid">
                <flux:navlist.item icon="user-group" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Administrativos') }}
                </flux:navlist.item>

                <flux:navlist.item icon="home-modern" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Residentes') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        {{-- NOTIFICACIONES --}}
        <flux:navlist variant="outline">
            <flux:navlist.item icon="bell" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Notificaciones') }}
            </flux:navlist.item>
        </flux:navlist>

        {{-- MENÚ DE USUARIO (Desktop) --}}
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu class="w-[240px]">
                {{-- Perfil del usuario --}}
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                {{-- INICIO --}}
                <flux:menu.group :heading="__('Inicio')">
                    <flux:menu.item icon="home" :href="route('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:menu.item>
                </flux:menu.group>

                <flux:menu.separator />

                {{-- FORMULARIOS --}}
                <flux:menu.group :heading="__('Formularios')">
                    <flux:menu.item icon="document-text" :href="route('dashboard')" wire:navigate>
                        {{ __('Formularios') }}
                    </flux:menu.item>
                    <flux:menu.item icon="clipboard-document-list" :href="route('dashboard')" wire:navigate>
                        {{ __('Mis formularios') }}
                    </flux:menu.item>
                    <flux:menu.item icon="chat-bubble-bottom-center-text" :href="route('dashboard')" wire:navigate>
                        {{ __('Respuestas') }}
                    </flux:menu.item>
                </flux:menu.group>

                <flux:menu.separator />

                {{-- TIQUETES --}}
                <flux:menu.group :heading="__('Tiquetes')">
                    <flux:menu.item icon="ticket" :href="route('dashboard')" wire:navigate>
                        {{ __('Abiertos') }}
                    </flux:menu.item>
                    <flux:menu.item icon="archive-box" :href="route('dashboard')" wire:navigate>
                        {{ __('Cerrados') }}
                    </flux:menu.item>
                </flux:menu.group>

                <flux:menu.separator />

                {{-- REPORTES --}}
                <flux:menu.group :heading="__('Reportes')">
                    <flux:menu.item icon="chart-bar" :href="route('dashboard')" wire:navigate>
                        {{ __('Gráficos y Reportes') }}
                    </flux:menu.item>
                </flux:menu.group>

                <flux:menu.separator />

                {{-- ROLES --}}
                <flux:menu.group :heading="__('Roles')">
                    <flux:menu.item icon="shield-check" :href="route('dashboard')" wire:navigate>
                        {{ __('Roles y Permisos') }}
                    </flux:menu.item>
                </flux:menu.group>

                <flux:menu.separator />

                {{-- USUARIOS --}}
                <flux:menu.group :heading="__('Usuarios')">
                    <flux:menu.item icon="user-group" :href="route('dashboard')" wire:navigate>
                        {{ __('Administrativos') }}
                    </flux:menu.item>
                    <flux:menu.item icon="home-modern" :href="route('dashboard')" wire:navigate>
                        {{ __('Residentes') }}
                    </flux:menu.item>
                </flux:menu.group>

                <flux:menu.separator />

                {{-- NOTIFICACIONES --}}
                <flux:menu.group :heading="__('Notificaciones')">
                    <flux:menu.item icon="bell" href="https://laravel.com/docs/starter-kits#livewire"
                        target="_blank">
                        {{ __('Ver notificaciones') }}
                    </flux:menu.item>
                </flux:menu.group>

                <flux:menu.separator />

                {{-- AJUSTES --}}
                <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                    {{ __('Configuración') }}
                </flux:menu.item>

                {{-- LOGOUT --}}
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Cerrar sesión') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
