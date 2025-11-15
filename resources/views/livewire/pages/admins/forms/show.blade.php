<div class="px-6 py-6">

    {{-- HEADER --}}
    <x-mary-header title="{{ __('Formulario: ') }} {{ $form->name }}" separator>
        <x-slot:actions>
            @haspermission('forms.edit')
                <x-mary-button 
                    icon="o-pencil" 
                    class="btn-warning" 
                    label="{{ __('Editar') }}" 
                    link="{{ route('forms.edit', $form) }}"
                    responsive 
                />
            @endhaspermission

            @haspermission('forms.delete')
                <x-mary-button 
                    icon="o-trash" 
                    class="btn-error" 
                    label="{{ __('Eliminar') }}" 
                    link="{{ route('forms.delete', $form) }}"
                    responsive 
                />
            @endhaspermission
        </x-slot>
    </x-mary-header>


    {{-- INFORMACIÓN GENERAL DEL FORMULARIO --}}
    <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Imagen --}}
        <div class="col-span-1">
            <div class="rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow">
                <img 
                    src="{{ $form->image_src ?? $form->img_url }}" 
                    class="w-full h-64 object-cover"
                >
            </div>
        </div>

        {{-- Datos del formulario --}}
        <div class="col-span-2 space-y-4">
            <x-mary-card title="{{ __('Información del Formulario') }}" shadow separator>
                
                <p class="text-gray-700 dark:text-gray-300 text-sm">
                    {{ $form->description ?? __('Sin descripción') }}
                </p>

                <div class="flex items-center gap-3 mt-4">
                    <span class="font-semibold text-gray-800 dark:text-gray-200">
                        {{ __('Estado:') }}
                    </span>

                    @if($form->hide)
                        <span class="badge badge-success">Activo</span>
                    @else
                        <span class="badge badge-error">Desactivado</span>
                    @endif
                </div>
            </x-mary-card>
        </div>
    </div>


    {{-- CAMPOS DEL FORMULARIO --}}
    <div class="mt-10">
        <x-mary-card title="{{ __('Campos del Formulario') }}" separator shadow>

            <form wire:submit.prevent="submitForm" class="space-y-6">

                @foreach ($form->fields as $field)

                    <div class="space-y-1">

                        {{-- Etiqueta --}}
                        <label class="block font-semibold text-gray-700 dark:text-gray-200">
                            {{ $field->label }}
                            @if($field->required)
                                <span class="text-red-500">*</span>
                            @endif
                        </label>

                        {{-- Campo dinámico --}}
                        @switch($field->type)

                            {{-- Campo TEXT --}}
                            @case('text')
                                <x-mary-input
                                    wire:model.defer="data.{{ $field->id }}"
                                    placeholder="{{ $field->description }}"
                                    clearable
                                />
                                @break


                            {{-- Campo TEXTAREA --}}
                            @case('textarea')
                                <x-mary-textarea
                                    rows="4"
                                    wire:model.defer="data.{{ $field->id }}"
                                    placeholder="{{ $field->description }}"
                                />
                                @break


                            {{-- Campo RATING -> RANGE 1-5 --}}
                            @case('rating')
                                <x-mary-range
                                    min="1"
                                    max="5"
                                    wire:model.defer="data.{{ $field->id }}"
                                    label="1 - 5"
                                />
                                @break


                            {{-- Campo IMAGE --}}
                            @case('image')
                                <x-mary-file 
                                    wire:model="data.{{ $field->id }}"
                                    accept="image/*"
                                    label="{{ __('Subir Imagen') }}"
                                />
                                @break


                            {{-- Campo COMMENT (textarea pequeña) --}}
                            @case('comment')
                                <x-mary-textarea
                                    rows="3"
                                    wire:model.defer="data.{{ $field->id }}"
                                    placeholder="{{ $field->description }}"
                                />
                                @break

                        @endswitch

                    </div>

                @endforeach


                {{-- BOTÓN DE GUARDAR --}}
                <div class="pt-4">
                    <x-mary-button 
                        label="{{ __('Enviar formulario') }}" 
                        icon="o-paper-airplane" 
                        class="btn-primary w-full md:w-auto"
                        type="submit"
                    />
                </div>

            </form>

        </x-mary-card>
    </div>
    {{-- <x-mary-modal wire:model="modalDeletConf" class="backdrop-blur">
        <div class="mb-5">
            <h3 class="font-extrabold mb-12">{{ __('¿Estas seguro?') }}</h3>
            <p>{{ __('Una vez se elimine una especialidad, se eliminaran todos los datos asociados a la misma') }}
            </p>
        </div>
        <div class="flex flex-row items-center justify-end gap-4">
            <x-mary-button label="Cancelar" @click="$wire.modalDeletConf = false" class="btn btn-cancel text-white" />
            <x-mary-button wire:click="destroy()" label="{{ __('Eliminar') }}" class="btn btn-error text-white" />
        </div>
    </x-mary-modal> --}}
    
</div>
