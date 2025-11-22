<div>
    <x-mary-header title="Administradores Ejemplo de push" subtitle="Lista usuarios" separator class="dark:text-white">
        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-bolt" placeholder="Buscar..." wire:model.live.debounce="search" />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" @click="$wire.createModal = true" />
        </x-slot:actions>
    </x-mary-header>

    <x-mary-card class="dark:bg-gray-800" shadow>
        <x-mary-table :headers="$headers" :rows="$administrators" :sort-by="$sortBy" with-pagination per-page="perPage"
            class="dark:text-white" link="/admin/users/administrators/show/{id}">>
            @scope('cell_role.name', $administrator)
                {{ $administrator->roles->first()?->name ?? __('Sin rol') }}
            @endscope
            <x-slot:empty>
                <x-mary-icon name="o-cube" label="{{ __('No hay datos.') }}" />
            </x-slot:empty>
        </x-mary-table>
    </x-mary-card>

    <x-mary-modal wire:model="createModal" title="Nuevo administrativo" subtitle="Crear un nuevo usuario administrativo">
        <x-mary-form no-separator wire:submit="store">
            <x-mary-errors title="{{ __('Parece que hay algunos errores') }}" icon="o-exclamation-triangle"
                class="bg-red-500 text-white rounded-md p-4" />
            <x-mary-input label="Nombre" wire:model="name" />
            <x-mary-input label="Correo" wire:model="email" />
            <x-mary-password label="Contraseña" wire:model="password" right />
            <x-mary-select label="Rol" wire:model="role_name" :options="$roles" option-label="role_name"
                option-value="role_name" placeholder-value="Seleccione un rol" />
            <x-slot:actions>
                <x-mary-button label="Cancelar" @click="$wire.createModal = false" />
                <x-mary-button label="Guardar" class="btn-primary" type="submit" spinner="store" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>
