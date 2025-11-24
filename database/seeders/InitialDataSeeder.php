<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Driver;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        //Akun Admin
        User::create([
            'name' => 'Admin Kereta',
            'email' => 'admin@kereta.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        
        //Akun Passenger
        User::create([
            'name' => 'Penumpang Cantik',
            'email' => 'passenger@kereta.com',
            'password' => Hash::make('password'),
            'role' => 'passenger',
        ]);

        //Data Driver
        // Data Driver
        Driver::create([
            'id' => 1,
            'name' => 'Devi Meong',
            'phone' => '8123456',
            'license_number' => '22222',
            'status' => 'available',
            'location_zone' => 'Cikampek',
        ]);

        Driver::create([
            'id' => 2,
            'name' => 'Adel Lumba',
            'phone' => '00000',
            'license_number' => '00000',
            'status' => 'available',
            'location_zone' => 'Blimbing',
        ]);

        Driver::create([
            'id' => 4,
            'name' => 'Nadip Ikan',
            'phone' => '082345',
            'license_number' => '33333',
            'status' => 'available',
            'location_zone' => 'Tlogomas',
        ]);


        $this->command->info('Data awal Admin, Passenger, dan Drivers berhasil dibuat!');
    }
}