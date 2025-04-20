<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        // Create the user account for the client
        $user = User::create([
            'name' => 'Luna Valen',
            'email' => 'client@example.com',
            'password' => Hash::make('password123'), // 🔐 Dev-only
            'role' => 'client', // optional if you use roles
        ]);

        // Create the client profile
        Client::create([
            'user_id' => $user->id,
            'full_name' => 'Luna Valen',
            'phone' => '555-0192',
            'dob' => '1995-05-22',
            'nationality' => 'Canadian',
        ]);

        $this->command->info('🙋 Client user created: client@example.com / password123');
    }
}
