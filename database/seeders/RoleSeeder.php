<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role seeder
        $roles = [
            'super_admin',
            'electrician',
            'janitor',
            'plumber',
            'security',
            'supervisor',
            'visitor'
        ];

        foreach($roles as $role) {
            Role::firstOrCreate([
                'name' => $role], [
                'guard_name' => 'web',
            ]);
        }
    }
}
