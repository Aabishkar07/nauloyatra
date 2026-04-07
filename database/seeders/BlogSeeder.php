<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Top 10 Destinations for Adventure Travel in 2024',
                'discription' => 'Discover the most thrilling destinations that will satisfy your wanderlust and push your boundaries. From mountain climbing to deep-sea diving, these locations offer unforgettable experiences for adrenaline junkies.',
                'image' => 'blog1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'A Complete Guide to Sustainable Tourism',
                'discription' => 'Learn how to travel responsibly while minimizing your environmental impact. This guide covers eco-friendly accommodations, carbon offset programs, and sustainable travel practices.',
                'image' => 'blog2.jpg',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'title' => 'Hidden Gems: Underrated European Cities',
                'discription' => 'Skip the crowds and discover these charming European cities that offer authentic experiences without the tourist traps. From medieval towns to coastal villages, explore hidden treasures.',
                'image' => 'blog3.jpg',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'title' => 'Budget Travel: How to Explore the World on $50 a Day',
                'discription' => 'Travel the world without breaking the bank with these proven budget travel strategies. Learn about cheap accommodation options, free activities, and money-saving tips.',
                'image' => 'blog4.jpg',
                'created_at' => now()->subWeek(),
                'updated_at' => now()->subWeek(),
            ],
            [
                'title' => 'The Ultimate Foodie Travel Guide',
                'discription' => 'Embark on a culinary journey around the world with our comprehensive food travel guide. From street food markets to Michelin-starred restaurants, discover must-try dishes.',
                'image' => 'blog5.jpg',
                'created_at' => now()->subWeeks(2),
                'updated_at' => now()->subWeeks(2),
            ],
            [
                'title' => 'Digital Nomad: Working Remotely from Paradise',
                'discription' => 'Transform your career and lifestyle by becoming a digital nomad. This guide covers the best destinations for remote work, visa requirements, and coworking spaces.',
                'image' => 'blog6.jpg',
                'created_at' => now()->subWeeks(3),
                'updated_at' => now()->subWeeks(3),
            ],
            [
                'title' => 'Solo Travel Safety Tips for Women',
                'discription' => 'Essential safety tips and empowering advice for women traveling alone. Learn about safe destinations, cultural considerations, and practical precautions.',
                'image' => 'blog7.jpg',
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ],
            [
                'title' => 'Luxury Travel: Experiencing the Finer Side',
                'discription' => 'Indulge in the world\'s most luxurious travel experiences, from private jets to exclusive resorts. Discover premium destinations and bespoke services.',
                'image' => 'blog8.jpg',
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
