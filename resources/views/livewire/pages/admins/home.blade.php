<div class="px-4 sm:px-6 lg:px-8 py-10 space-y-8">

    {{-- 💬 Mensaje de bienvenida --}}
    <div class="text-center space-y-2 mb-10">
        <h1 class="font-bold text-3xl sm:text-4xl text-gray-800 dark:text-gray-100">
            {{ __('Hola, bienvenido ') . $user->name }} 👋
        </h1>
        <p class="text-gray-600 dark:text-gray-300 text-lg">
            {{ __('Estamos muy contentos de que formes parte de la comunidad del condominio.') }}
        </p>
    </div>
    <x-mary-tabs wire:model="selectedTab">
        <x-mary-tab name="notifications-tab" label="{{ auth()->user()->unreadNotifications->count() }} @choice('Notificaición|Notificaciones', auth()->user()->unreadNotifications->count())"
            icon="o-credit-card">
            {{-- 🔔 Nuevas notificaciones --}}
            <x-mary-card title="{{ __('New notifications') }}" class="mb-8 shadow-lg" >
                @forelse ($unreadNotifications as $notification)
                    @php
                        $name = trim(
                            ($notification->data['customer_name'] ?? __('No name available')) .
                                ' ' .
                                ($notification->data['customer_lastName'] ?? __('No last name available')),
                        );
                        $subject = $notification->data['subject'] ?? __('Unknown');
                        $message = $notification->data['message'] ?? __('Unknown');

                        $item = [
                            'value' => $subject,
                            'subValue' => $message . ' • ' . $notification->created_at->diffForHumans(),
                        ];
                    @endphp

                    <x-mary-list-item :item="$item">
                        <x-slot:avatar>
                            <x-mary-badge value="{{ __('New') }}" class="badge-primary badge-soft" />
                        </x-slot:avatar>

                        <x-slot:actions>
                            <x-mary-button icon="check" class="btn-sm" label="{{ __('Mark as read') }}"
                                wire:click="markAsRead('{{ $notification->id }}')" spinner />
                            <x-mary-button icon="trash" class="btn-sm" label="{{ __('Delete') }}"
                                wire:click="deleteConf('{{ $notification->id }}')" spinner />
                        </x-slot:actions>
                    </x-mary-list-item>
                @empty
                    <div>
                        <x-mary-icon name="o-cube-transparent" :label="__('There are not new notifications')" />
                    </div>
                @endforelse
                <div class="mt-6 flex justify-center">
                    <x-mary-button icon="o-clipboard-document-list" label="{{ __('Ver notificaciones') }}"
                        link="#" 
                        class="text-base font-semibold transition-all duration-200 hover:scale-105" />
                </div>
            </x-mary-card>
        </x-mary-tab>
    </x-mary-tabs>

    {{-- 📋 Formularios disponibles --}}
    <section class="mt-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">
            {{ __('Formularios mas recientes disponibles') }}
        </h2>

        @if(!empty($forms))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($forms as $form)
                    <a href="#"
                        class="group relative block rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-md hover:shadow-xl transition-transform transform hover:-translate-y-1 hover:ring-2 hover:ring-primary/30">

                        {{-- Imagen --}}
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $form['image_src'] ?? $form['img_url'] }}" alt="{{ $form['name'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">

                            {{-- Overlay con descripción al hover --}}
                            <div
                                class="absolute inset-0 bg-black/70 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center text-center p-4">
                                <p class="text-sm">{{ $form['description'] }}</p>
                            </div>
                        </div>

                        {{-- Contenido --}}
                        <div class="p-4 flex flex-col items-center text-center space-y-2">
                            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100 line-clamp-1">
                                {{ $form['name'] }}
                            </h3>

                            <div class="flex items-center gap-1 text-primary/80 font-medium text-sm">
                                <x-mary-icon name="o-eye" class="w-4 h-4" />
                                <span>{{ __('Ver formulario') }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-6 flex justify-center">
                <x-mary-button icon="o-clipboard-document-list" label="{{ __('Ver todos los formularios') }}"
                    link="#" size="lg"
                    class="text-base font-semibold transition-all duration-200 hover:scale-105" />
            </div>
        @else
            <div
                class="col-span-full bg-gray-100 dark:bg-gray-800 p-8 rounded-2xl text-center ring-1 ring-gray-200/70 dark:ring-gray-700/60">
                <p class="text-gray-600 dark:text-gray-300 font-medium">
                    {{ __('No hay formularios disponibles por el momento.') }}
                </p>
            </div>
        @endif
    </section>
    <x-mary-modal wire:model="modalDeletConf" class="backdrop-blur">
        <div class="mb-5">
            <h3 class="font-extrabold mb-12">{{ __('ARE YOU SURE?') }}</h3>
            <p>{{ __('Select DO IT! to delete it.') }}</p>
        </div>
        <div class="flex flex-row items-center justify-end gap-4">
            <x-mary-button wire:click="delete()" label="{{ __('DO IT!') }}" class="btn btn-error" />
            <x-mary-button label="{{ __('Cancel') }}" @click="$wire.modalDeletConf = false" class="btn btn-warning" />
        </div>
    </x-mary-modal>
</div>
