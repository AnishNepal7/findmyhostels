<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $roles = ['user', 'admin', 'hostel_owner'];
        foreach ($roles as $roleName) {
            Role::create(['name' => $roleName]);
        }
    }
}
