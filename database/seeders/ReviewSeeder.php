<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Using DB facade to insert reviews since we need to check the exact table name
        $reviews = [
            [
                'user_name' => 'Sarah Johnson',
                'user_counrty' => 'United States',
                'user_discription' => 'Absolutely incredible experience! The Swiss Alps trek was breathtaking and our guide was knowledgeable and friendly. The accommodations were perfect and the food was delicious. Would definitely recommend to anyone looking for adventure!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'Michael Chen',
                'user_counrty' => 'Canada',
                'user_discription' => 'The Maldives resort exceeded all expectations. Crystal clear waters, pristine beaches, and exceptional service. The diving experience was unforgettable. This was our honeymoon and they made it truly special.',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'user_name' => 'Emma Williams',
                'user_counrty' => 'United Kingdom',
                'user_discription' => 'Japan cultural tour was fascinating! Loved visiting ancient temples, experiencing traditional tea ceremonies, and exploring modern Tokyo. The tour guide was excellent and provided great insights into Japanese culture.',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'user_name' => 'Raj Patel',
                'user_counrty' => 'India',
                'user_discription' => 'Singapore business trip was well-organized. Great balance between meetings and leisure activities. The city tours were informative and the networking events were valuable. Will definitely use this service again.',
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(6),
            ],
            [
                'user_name' => 'Sophie Martin',
                'user_counrty' => 'France',
                'user_discription' => 'Kenya safari was a dream come true! Saw the Big Five on our first day. The lodge was comfortable and the guides were experts at spotting wildlife. The hot air balloon ride over the savanna was magical.',
                'created_at' => now()->subWeek(),
                'updated_at' => now()->subWeek(),
            ],
            [
                'user_name' => 'Carlos Rodriguez',
                'user_counrty' => 'Spain',
                'user_discription' => 'Greek islands hopping was amazing! Each island had its own charm. Loved the beaches, food, and hospitality. The ferry connections were smooth and the accommodations were authentic Greek experiences.',
                'created_at' => now()->subWeeks(2),
                'updated_at' => now()->subWeeks(2),
            ],
            [
                'user_name' => 'Lisa Anderson',
                'user_counrty' => 'Australia',
                'user_discription' => 'India Golden Triangle tour was eye-opening. The Taj Mahal was breathtaking, and the cultural experiences were rich. Our driver was safe and knowledgeable. A must-do for anyone interested in Indian history and culture.',
                'created_at' => now()->subWeeks(3),
                'updated_at' => now()->subWeeks(3),
            ],
            [
                'user_name' => 'Ahmed Hassan',
                'user_counrty' => 'UAE',
                'user_discription' => 'Dubai luxury experience was outstanding! From desert safari to Burj Khalifa, everything was first-class. The hotel was spectacular and the city tours were comprehensive. Great for both business and leisure.',
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ],
            [
                'user_name' => 'Maria Garcia',
                'user_counrty' => 'Mexico',
                'user_discription' => 'Norway fjords cruise was spectacular! The scenery was unlike anything I\'ve ever seen. The midnight sun experience was unique. The ship was comfortable and the excursions were well-planned and informative.',
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ],
            [
                'user_name' => 'David Kim',
                'user_counrty' => 'South Korea',
                'user_discription' => 'Bali retreat was exactly what I needed. Perfect blend of relaxation and adventure. The yoga sessions were rejuvenating and the temple visits were spiritual. The villa was beautiful and the staff was attentive.',
                'created_at' => now()->subWeeks(4),
                'updated_at' => now()->subWeeks(4),
            ],
            [
                'user_name' => 'Anna Petrov',
                'user_counrty' => 'Russia',
                'user_discription' => 'Egypt ancient wonders tour was educational and fascinating. The pyramids and temples were awe-inspiring. Our Egyptologist guide was incredibly knowledgeable. The Nile cruise was a highlight of the trip.',
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],
            [
                'user_name' => 'James Wilson',
                'user_counrty' => 'New Zealand',
                'user_discription' => 'New York business gateway was efficient and impressive. Great networking opportunities and excellent accommodations. The Broadway show was a fantastic addition. Perfect for business travelers who want to experience the city.',
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],
        ];

        // Insert into the user_reviews table
        \DB::table('user_reviews')->insert($reviews);
    }
}
