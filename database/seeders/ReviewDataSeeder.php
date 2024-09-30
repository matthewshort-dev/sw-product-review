<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::insert(
            [
                [
                    'user_id' => 2,
                    'review_title' => "I love it",
                    'review_text' => "This Fender Stratocaster is everything I hoped for! The tone is perfect, and it's super comfortable to play. You can feel the quality in every strum. Highly recommend for any guitarist.",
                    'rating' => 5,
                    'created_at' => '2024-09-30 21:05:42',
                    'updated_at' => '2024-09-30 21:05:42',
                ],
                [
                    'user_id' => 3,
                    'review_title' => "Amazing tone",
                    'review_text' => "Boy, I sure like to write long reviews. Here we go! The tone on this Strat is absolutely amazing. Whether I'm playing clean or with distortion, the sound is rich and full. It's a bit pricey, but the quality more than justifies the cost. I think that the grain is just gorgeous and I can spend hours just looking at it while it hangs on my wall. The pickups, offset by the black pickguard, look and sound fantastic. Each knob operates perfectly without any scratchy sounds, and the five way toggle works like a dream. I also inspected each screw on the pickguard and found that each were tightened to proper torque specs which is a real bonus. You don't want untorqued screws! Lastly, I feel like I should mention that the fret ends are rounded and smoothed to perfection.",
                    'rating' => 5,
                    'created_at' => '2024-09-30 21:05:42',
                    'updated_at' => '2024-09-30 21:05:42',
                ],
                [
                    'user_id' => 4,
                    'review_title' => "Great but expensive",
                    'review_text' => "This guitar sounds fantastic, but it is a big investment. I've had cheaper guitars that were decent, but this one really shines with its build quality and sound. Worth it if you're serious about your playing.",
                    'rating' => 4,
                    'created_at' => '2024-09-30 21:05:42',
                    'updated_at' => '2024-09-30 21:05:42',
                ],
                [
                    'user_id' => 5,
                    'review_title' => "Perfect for gigs",
                    'review_text' => "I've been using this Strat for live gigs, and it's been an absolute beast. Great tone, lightweight, and reliable. It stays in tune even after long sessions, and the neck is smooth and fast.",
                    'rating' => 5,
                    'created_at' => '2024-09-30 21:05:42',
                    'updated_at' => '2024-09-30 21:05:42',
                ],
                [
                    'user_id' => 6,
                    'review_title' => "Versatile and powerful",
                    'review_text' => "This guitar can handle anything from blues to rock to jazz. It's incredibly versatile and delivers consistently across all genres. A must-have for anyone looking for a reliable and powerful guitar.",
                    'rating' => 5,
                    'created_at' => '2024-09-30 21:05:42',
                    'updated_at' => '2024-09-30 21:05:42',
                ],
                [
                    'user_id' => 7,
                    'review_title' => "Outstanding sound",
                    'review_text' => "I've been playing guitar for over 20 years, and this electric guitar is hands down the best I've ever owned. The tone is crisp and clear, with a warmth that's perfect for blues and rock. The neck is smooth as butter, making those fast licks a breeze.",
                    'rating' => 5,
                    'created_at' => '2024-09-30 21:05:42',
                    'updated_at' => '2024-09-30 21:05:42',
                ],
            ]
        );
    }
}
