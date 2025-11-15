<?php

namespace Database\Seeders;

use App\Models\SubModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubModuleSeeder extends Seeder
{
    public function run(): void
    {
        SubModule::insert([
            [
                'name' => 'Opciones del Menú',
            ],
            [
                'name' => 'Panel de Principal',
            ],
            [
                'name' => 'Formularios',
            ],
            [
                'name' => 'Tiquetes',
            ],
            [
                'name' => 'Graficos y Reportes',
            ],
            [
                'name' => 'Roles y Permisos',
            ],
            [
                'name' => 'Usuarios',
            ],
        ]);
    }
}
