<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // We're not creating test users here anymore since our RolesAndPermissionsSeeder
        // will create the admin user
        
        // Seed roles and permissions
        $this->call(RolesAndPermissionsSeeder::class);
    }
}
