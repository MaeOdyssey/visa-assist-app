<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\VisaApplication;
use Illuminate\Database\Seeder;

class VisaApplicationSeeder extends Seeder
{
    public function run(): void
    {
        // Find the client by user email
        $client = Client::whereHas('user', function ($query) {
            $query->where('email', 'client@example.com');
        })->first();

        if (!$client) {
            $this->command->warn('⚠️ Client not found. Make sure ClientSeeder runs first.');
            return;
        }

        VisaApplication::insert([
            [
                'client_id' => $client->id,
                'visa_type' => 'Tourist Visa',
                'purpose' => 'Vacationing in France',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_id' => $client->id,
                'visa_type' => 'Work Visa',
                'purpose' => 'Tech conference and job onboarding',
                'status' => 'under_review',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_id' => $client->id,
                'visa_type' => 'Family Visa',
                'purpose' => 'Visiting relatives abroad',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $this->command->info('🛂 Seeded 3 visa applications for client@example.com!');
    }
}
