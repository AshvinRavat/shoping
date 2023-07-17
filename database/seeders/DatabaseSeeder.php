<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'phone' => '9099847913',
            'password' => Hash::make('Customer@123'),
            'email_verified_at' => now(),
            'user_type' => '0',
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '9687625080',
            'password' => Hash::make('Admin@123'),
            'email_verified_at' => now(),
            'user_type' => '1',
        ]);

        $this->command->info('Users created successfully');
    }
}
