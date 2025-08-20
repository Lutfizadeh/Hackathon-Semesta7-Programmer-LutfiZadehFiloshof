<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user seeder
        $admin = User::firstOrCreate([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('super_admin');

        $visitor = User::firstOrCreate([
            'name' => 'Visitor',
            'email' => 'visitor@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $visitor->assignRole('visitor');

        $electrician = User::firstOrCreate([
            'name' => 'Electrician',
            'email' => 'electrician@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $electrician->assignRole('electrician');

        $janitor = User::firstOrCreate([
            'name' => 'Janitor',
            'email' => 'janitor@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $janitor->assignRole('janitor');

        $plumber = User::firstOrCreate([
            'name' => 'Plumber',
            'email' => 'plumber@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $plumber->assignRole('plumber');

        $security = User::firstOrCreate([
            'name' => 'Security',
            'email' => 'security@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $security->assignRole('security');

        $supervisor = User::firstOrCreate([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $supervisor->assignRole('supervisor');
    }
}
