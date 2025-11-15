<?php

namespace Database\Seeders;

use App\Models\Resident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentSeeder extends Seeder
{
    public function run(): void
    {
        Resident::insert([
            [
                'user_id' => 2,
                'phoneNumber' => '8888-1111',
                'houseNumber' => '101A',
                'numberOfResidents' => 3,
            ],
            [
                'user_id' => 4,
                'phoneNumber' => '8888-2222',
                'houseNumber' => '102B',
                'numberOfResidents' => 2,
            ],
            [
                'user_id' => 5,
                'phoneNumber' => '8888-3333',
                'houseNumber' => '103C',
                'numberOfResidents' => 4,
            ],
            [
                'user_id' => 6,
                'phoneNumber' => '8888-4444',
                'houseNumber' => '104D',
                'numberOfResidents' => 5,
            ],
        ]);
    }
}
