<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador Condominio',
            'email' => 'admin@condominio.test',
            'password' => Hash::make('12345678'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@condominio.test',
            'password' => Hash::make('12345678'),
        ])->assignRole('Residente');

        User::create([
            'name' => 'Admin Mainor',
            'email' => 'mainor@condominio.test',
            'password' => Hash::make('12345678'),
        ])->assignRole('Ejecutivo');

        User::create([
            'name' => 'Sonia López',
            'email' => 'sonia@condominio.test',
            'password' => Hash::make('12345678'),
        ])->assignRole('Residente');
        
        User::create([
            'name' => 'Randall Smith',
            'email' => 'randall@condominio.test',
            'password' => Hash::make('12345678'),
        ])->assignRole('Residente');
        
        User::create([
            'name' => 'Gabriela Torres',
            'email' => 'gabriel@condominio.test',
            'password' => Hash::make('12345678'),
        ])->assignRole('Residente');
    }
}
