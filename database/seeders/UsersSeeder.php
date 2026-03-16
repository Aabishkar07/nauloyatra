<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'phone_number' => '0000000000',
                'user_country' => 'Unknown',
                'role' => 'user',
            ]
        );

        User::updateOrCreate(
            ['email' => 'aa@gmail.com'],
            [
                'name' => 'AA User',
                'password' => Hash::make('12345678'),
                'phone_number' => '0000000000',
                'user_country' => 'Unknown',
                'role' => 'user',
            ]
        );
    }
}
