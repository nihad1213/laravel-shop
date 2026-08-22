<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            ['title' => 'How to Store Your Vinyl Collection the Right Way', 'excerpt' => 'Humidity, sunlight, and shelf angle all matter more than you think when it comes to keeping records in shape.', 'category' => 'Guides', 'published_at' => '2026-07-12'],
            ['title' => '5 Overlooked Pressings Worth a Second Look', 'excerpt' => 'Some of the best sounding records never got the hype. Here are five that deserve more attention.', 'category' => 'Collecting', 'published_at' => '2026-07-06'],
            ['title' => 'CD or Vinyl: Does the Format Actually Change the Sound?', 'excerpt' => 'We break down the real differences between formats, beyond the usual debate.', 'category' => 'Deep Dive', 'published_at' => '2026-06-28'],
            ['title' => 'Inside a Record Shop: A Day on the Floor', 'excerpt' => 'What it actually takes to keep a crate-digging destination running week to week.', 'category' => 'Stories', 'published_at' => '2026-06-19'],
        ];

        foreach ($posts as $index => $post) {
            BlogPost::updateOrCreate(
                ['slug' => Str::slug($post['title'])],
                [
                    ...$post,
                    'image' => "https://picsum.photos/seed/blog{$index}/400/250",
                    'is_published' => true,
                ]
            );
        }
    }
}
