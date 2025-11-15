<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SubModuleSeeder::class,
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            ResidentSeeder::class,
            FormSeeder::class,
            FormEntrySeeder::class,
        ]);
    }
}
