<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        // User permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        
        // Role permissions
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);
        
        // Create roles and assign permissions
        // Create super-admin role (has all permissions via Gate::before rule)
        Role::create(['name' => 'super-admin']);
        
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());
        
        $managerRole = Role::create(['name' => 'manager']);
        $managerRole->givePermissionTo([
            'view users', 'create users', 'edit users',
            'view roles'
        ]);
        
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'view users'
        ]);
        
        // Create admin user
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        
        // Assign super-admin role to the admin user
        $admin->assignRole('super-admin');
    }
}
