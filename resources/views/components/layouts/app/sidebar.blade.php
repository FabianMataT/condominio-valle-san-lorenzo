@php
    $menuOptions = [
        [
            'heading' => 'Inicio',
            'items' => [
                [
                    'permission' => 'home.index',
                    'name' => 'Dashboard',
                    'icon' => 'home',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'heading' => 'Formularios',
            'items' => [
                [
                    'permission' => 'forms.index',
                    'name' => 'Formularios',
                    'icon' => 'document-text',
                    'route' => 'forms.index',
                ],
                [
                    'permission' => 'my.forms.index',
                    'name' => 'Mis Formularios',
                    'icon' => 'clipboard-document-list',
                    'route' => 'dashboard',
                ],
                [
                    'permission' => 'responses.index',
                    'name' => 'Respuestas',
                    'icon' => 'chat-bubble-bottom-center-text',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'heading' => 'Tiquetes',
            'items' => [
                [
                    'permission' => 'tickets.open.index',
                    'name' => 'Abiertos',
                    'icon' => 'ticket',
                    'route' => 'dashboard',
                ],
                [
                    'permission' => 'tickets.closed.index',
                    'name' => 'Cerrados',
                    'icon' => 'archive-box',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'heading' => 'Reportes',
            'items' => [
                [
                    'permission' => 'charts.reports.index',
                    'name' => 'Gráficos y Reportes',
                    'icon' => 'chart-bar',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'heading' => 'Roles',
            'items' => [
                [
                    'permission' => 'roles.index',
                    'name' => 'Roles y Permisos',
                    'icon' => 'key',
                    'route' => 'dashboard',
                ],
            ],
        ],
        [
            'heading' => 'Usuarios',
            'items' => [
                [
                    'permission' => 'administrators.index',
                    'name' => 'Administrativos',
                    'icon' => 'user-group',
                    'route' => 'users.administrators.index',
                ],
                [
                    'permission' => 'residents.index',
                    'name' => 'Residentes',
                    'icon' => 'user',
                    'route' => 'dashboard',
                ],
            ],
        ],
    ];
@endphp

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

        @foreach ($menuOptions as $group)
            @php
                $permissions = collect($group['items'])->pluck('permission')->toArray();
            @endphp
            @if (auth()->user()->hasAnyPermission($permissions))
                <flux:navlist variant="outline">
                    <flux:navlist.group :heading="__($group['heading'])" class="grid">
                        @foreach ($group['items'] as $item)
                            @haspermission($item['permission'])
                                <flux:navlist.item icon="{{ $item['icon'] }}" href="{{ route($item['route']) }}"
                                    :current="request()->routeIs($item['route'])" wire:navigate>
                                    {{ __($item['name']) }}
                                </flux:navlist.item>
                            @endhaspermission
                        @endforeach
                    </flux:navlist.group>
                </flux:navlist>
            @endif
        @endforeach

        <flux:spacer />

        {{-- NOTIFICACIONES --}}
        <flux:navlist variant="outline">
            <flux:navlist.item icon="bell" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('0 Notificaciones') }}
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

                @foreach ($menuOptions as $group)
                    @php
                        $permissions = collect($group['items'])->pluck('permission')->toArray();
                    @endphp
                    @if (auth()->user()->hasAnyPermission($permissions))
                        <flux:menu.group :heading="__($group['heading'])">
                            @foreach ($group['items'] as $item)
                                @haspermission($item['permission'])
                                    <flux:menu.item icon="{{ $item['icon'] }}" href="{{ route($item['route']) }}"
                                        wire:navigate>
                                        {{ __($item['name']) }}
                                    </flux:menu.item>
                                @endhaspermission
                            @endforeach
                        </flux:menu.group>
                    @endif
                @endforeach

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
