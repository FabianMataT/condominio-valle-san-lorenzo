<div>
    <x-mary-header title="Administrador {{ $administrator->name }}" subtitle="Informacion del usuario administrativo"
        separator>
        <x-slot:actions>
            <x-mary-button icon="o-arrow-left" class="btn btn-md" label="Regresar" :link="route('users.administrators.index')" />
            <x-mary-button icon="o-pencil" class="btn btn-md" label="Editar" wire:click="edit" responsive />
            <x-mary-button icon="o-trash" class="btn-neutral btn-md" label="Eliminar" spinner
                wire:click='deleteConf({{ $administrator->id }})' responsive />
        </x-slot:actions>
    </x-mary-header>

    <x-mary-card class="mt-6 dark:bg-gray-800">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-600 dark:text-gray-200">

            <div>
                <p class="font-semibold">Nombre</p>
                <p>{{ $administrator->name }}</p>
            </div>

            <div>
                <p class="font-semibold">Correo</p>
                <p>{{ $administrator->email }}</p>
            </div>

            <div>
                <p class="font-semibold">Rol</p>
                <p>{{ $administrator->roles->first()?->name ?? 'Sin rol' }}</p>
            </div>

            <div>
                <p class="font-semibold">Fecha creación</p>
                <p>{{ $administrator->created_at->format('d/m/Y') }}</p>
            </div>

        </div>
    </x-mary-card>

    <x-mary-modal wire:model="editModal" title="Actualizar administrativo" subtitle="Editar el usuario administrativo">
        <x-mary-form no-separator wire:submit="update">
            <x-mary-errors title="{{ __('Parece que hay algunos errores') }}" icon="o-exclamation-triangle"
                class="bg-red-500 text-white rounded-md p-4" />
            <x-mary-input label="Nombre" wire:model="name" />
            <x-mary-input label="Correo" wire:model="email" />
            <x-mary-password label="Contraseña" wire:model="password" right />
            <x-mary-select label="Rol" wire:model="role_name" :options="$roles" option-label="role_name"
                option-value="role_name" placeholder-value="Seleccione un rol" />
            <x-slot:actions>
                <x-mary-button label="Cancelar" @click="$wire.editModal = false" />
                <x-mary-button label="Actualizar" class="btn-primary" type="submit" spinner="update" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>

    {{-- Tabla de Tickets --}}
    {{-- <div class="mt-10">
        <x-mary-card class="dark:bg-gray-800">
            <x-mary-header title="Tickets asignados" subtitle="Tickets en los que trabaja este usuario" separator />
            <x-mary-table :headers="$headers" :rows="$rows" with-pagination="false" class="dark:text-white">
                <x-slot:empty>
                    <x-mary-icon name="o-cube" label="No hay tickets asignados." />
                </x-slot:empty>
            </x-mary-table>
        </x-mary-card>
    </div> --}}
</div>
