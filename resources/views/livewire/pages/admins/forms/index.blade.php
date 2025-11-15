<div>
    <x-mary-header title="{{ __('Fomrs') }}" separator>
        <x-slot:middle class="!justify-end">
            <x-mary-input wire:model.live='search' icon="o-magnifying-glass" clearable
                placeholder="{{ __('Search...') }}" />
        </x-slot:middle>
        <x-slot:actions>
            @haspermission('forms.create')
                <x-mary-button icon="o-plus" class="btn-primary" label="{{ __('Create') }}" link="{{ route('forms.create') }}"
                    responsive />
            @endhaspermission
        </x-slot:actions>
    </x-mary-header>

    @if (!empty($forms))
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($forms as $form)
                <a href="{{ route('forms.show', $form) }}"
                    class="group relative block rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-md hover:shadow-xl transition-transform transform hover:-translate-y-1 hover:ring-2 hover:ring-primary/30">

                    {{-- Imagen --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $form->image_src }}" alt="{{ $form->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div
                            class="absolute inset-0 bg-black/70 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center text-center p-4">
                            <p class="text-sm">{{ $form->description }}</p>
                        </div>
                    </div>

                    {{-- Contenido --}}
                    <div class="p-4 flex flex-col items-center text-center space-y-2">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100 line-clamp-1">
                            {{ $form->name }}
                        </h3>

                        <div class="flex items-center gap-1 text-primary/80 font-medium text-sm">
                            <x-mary-icon name="o-eye" class="w-4 h-4" />
                            <span>{{ __('Ver formulario') }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div
            class="col-span-full bg-gray-100 dark:bg-gray-800 p-8 rounded-2xl text-center ring-1 ring-gray-200/70 dark:ring-gray-700/60">
            <p class="text-gray-600 dark:text-gray-300 font-medium">
                {{ __('No hay formularios disponibles por el momento.') }}
            </p>
        </div>
    @endif
</div>
