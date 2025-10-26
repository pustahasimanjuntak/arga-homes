<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin Arga Homes',
            'email' => 'admin@argahomes.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create Regular User for testing
        User::create([
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        echo "Admin and test user created successfully!\n";
        echo "Admin - Email: admin@argahomes.com, Password: admin123\n";
        echo "User - Email: user@test.com, Password: user123\n";
    }
}