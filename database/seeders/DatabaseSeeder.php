<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vehicle;

class DatabaseSeeder extends Seeder {
    public function run() {
        // Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@redspot.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Sample customers (requires UserFactory)
        User::factory()->count(5)->create();

        // Vehicles
        Vehicle::create([
            'reg_no' => 'ABC123',
            'make' => 'Toyota',
            'model' => 'Corolla',
            'year' => 2022,
            'type' => 'Sedan',
            'seats' => 5,
            'transmission' => 'auto',
            'daily_rate' => 59.99,
            'status' => 'available',
        ]);

        Vehicle::create([
            'reg_no' => 'XYZ789',
            'make' => 'Hyundai',
            'model' => 'i30',
            'year' => 2021,
            'type' => 'Hatchback',
            'seats' => 5,
            'transmission' => 'manual',
            'daily_rate' => 49.99,
            'status' => 'available',
        ]);
    }
}
