<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user account
        $user = User::create([
            'name' => 'Admin Mae',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // 🔐 Secure this in real apps!
            'role' => 'admin', // optional: only if you're using a role column
        ]);

        // Create related admin profile
        Admin::create([
            'user_id' => $user->id,
            'name' => 'Mae S. Control',
            'position' => 'Head Reviewer',
        ]);

        $this->command->info('🧑‍💼 Admin user created: admin@example.com / password123');
    }
}
