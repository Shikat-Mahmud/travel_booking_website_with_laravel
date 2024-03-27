<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create(
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'role' => 'super_admin',
                'password' => bcrypt('123456'),
            ]
        );

        $admin = User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),
            ]
        );

        $superAdmin->assignRole('super_admin', 'admin');
        $admin->assignRole('admin');
    }
}
