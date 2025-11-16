<div>
    <x-mary-card class="p-10" shadow>
        <h1>Crear Administrador</h1>
        <x-mary-form wire:submit="store" shadow>
            <x-mary-input label="Nombre" wire:model="name" />
            <x-mary-input label="Correo" wire:model="email" />
            <x-mary-password label="Contraseña" wire:model="password" right />
            <x-mary-select label="Rol" wire:model="role_name" :options="$roles" option-label="role_name" option-value="role_name" placeholder-value=""/>
            <x-slot:actions>
                <x-mary-button label="Regresar" :link="route('users.administrators.index')" />
                <x-mary-button label="Guardar" class="btn-primary" type="submit" spinner="store" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-card>
</div>
