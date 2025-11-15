<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Ejecutivo']);
        $role3 = Role::create(['name' => 'Residente']);

        //Opciones del Menu
        Permission::create(['name' => 'home.index', 'description' => 'Panel de Principal', 'sub_module_id' => 1])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'forms.index', 'description' => 'Formularios', 'sub_module_id' => 1])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'my.forms.index', 'description' => 'Mis Formularios', 'sub_module_id' => 1])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'responses.index', 'description' => 'Respuestas', 'sub_module_id' => 1])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tickets.open.index', 'description' => 'Tiquetes Abiertos', 'sub_module_id' => 1])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'tickets.closed.index', 'description' => 'Tiquetes Cerrados', 'sub_module_id' => 1])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'charts.reports.index', 'description' => 'Gráficos y Reportes', 'sub_module_id' => 1])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'administrators.index', 'description' => 'Usuarios Administrativos', 'sub_module_id' => 1])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'roles.index', 'description' => 'Roles y Permisos', 'sub_module_id' => 1])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'residents.index', 'description' => 'Residentes', 'sub_module_id' => 1])->syncRoles([$role1, $role2]);


        // Opciones del Form
        Permission::create(['name' => 'forms.create', 'description' => 'Crear Formularios', 'sub_module_id' => 3])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'forms.edit', 'description' => 'Editar Formularios', 'sub_module_id' => 3])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'forms.show', 'description' => 'Ver Formularios', 'sub_module_id' => 3])->syncRoles([$role1, $role2]);

        // 'name' => 'Opciones del Menú',
        // 'name' => 'Panel de Principal',
        // 'name' => 'Formularios',
        // 'name' => 'Tiquetes',
        // 'name' => 'Graficos y Reportes',
        // 'name' => 'Roles y Permisos',
        // 'name' => 'Usuarios',
    }
}
