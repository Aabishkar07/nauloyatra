<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567890',
                'user_country' => 'United States',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567891',
                'user_country' => 'Canada',
                'role' => 'user',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'name' => 'Robert Johnson',
                'email' => 'robert.j@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567892',
                'user_country' => 'United Kingdom',
                'role' => 'user',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'maria.g@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567893',
                'user_country' => 'Spain',
                'role' => 'user',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'name' => 'Li Wei',
                'email' => 'li.wei@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567894',
                'user_country' => 'China',
                'role' => 'user',
                'created_at' => now()->subWeek(),
                'updated_at' => now()->subWeek(),
            ],
            [
                'name' => 'Ahmed Hassan',
                'email' => 'ahmed.h@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567895',
                'user_country' => 'UAE',
                'role' => 'user',
                'created_at' => now()->subWeeks(2),
                'updated_at' => now()->subWeeks(2),
            ],
            [
                'name' => 'Sophie Martin',
                'email' => 'sophie.m@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567896',
                'user_country' => 'France',
                'role' => 'user',
                'created_at' => now()->subWeeks(3),
                'updated_at' => now()->subWeeks(3),
            ],
            [
                'name' => 'Carlos Rodriguez',
                'email' => 'carlos.r@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567897',
                'user_country' => 'Mexico',
                'role' => 'user',
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ],
            [
                'name' => 'Emma Wilson',
                'email' => 'emma.w@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567898',
                'user_country' => 'Australia',
                'role' => 'user',
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ],
            [
                'name' => 'Raj Patel',
                'email' => 'raj.p@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '+1234567899',
                'user_country' => 'India',
                'role' => 'user',
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
