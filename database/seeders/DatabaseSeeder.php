<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'first_name' => 'Default',
                'last_name' => 'Admin',
                'password' => Hash::make('password'), // Change this to a secure password
                'user_type' => 'admin',
                'remember_token' => Str::random(10),
            ]
        );
    }
}



