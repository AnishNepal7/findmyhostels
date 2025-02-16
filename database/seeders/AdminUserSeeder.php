<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find or create the 'admin' role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create the admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Unique identifier (e.g., email)
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'), // Default password
            ]
        );

        // Assign the 'admin' role to the user if not already assigned
        if (!$adminUser->roles->contains($adminRole)) {
            $adminUser->roles()->attach($adminRole);
        }
    }
}