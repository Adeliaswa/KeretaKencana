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
        Driver::create([
            'name' => 'Devi Meong (Available)',
            'location_zone' => 'Cikampek',
            'rating' => 4.9,
            'is_available' => true,
        ]);

        Driver::create([
            'name' => 'Adel Lumba (Sibuk)',
            'location_zone' => 'Blimbing',
            'rating' => 4.6,
            'is_available' => false,
        ]);
        
        Driver::create([
            'name' => 'Nadip Ikan',
            'location_zone' => 'Tlogomas',
            'rating' => 5.0,
            'is_available' => true,
        ]);

        $this->command->info('Data awal Admin, Passenger, dan Drivers berhasil dibuat!');
    }
}