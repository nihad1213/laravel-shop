<?php

declare(strict_types=1);

namespace App\Services\Home;

use App\Models\BestSeller;
use App\Models\BlogPost;
use Inertia\Inertia;
use Inertia\Response;

class HomeService
{
    public function showHomePage(): Response
    {
        return Inertia::render('Home/HomePage', [
            'bestSelling' => BestSeller::query()
                ->with('product')
                ->whereHas('product', fn ($query) => $query->where('is_active', true))
                ->orderBy('position')
                ->get()
                ->pluck('product')
                ->values(),
            'blogPosts' => BlogPost::query()
                ->where('is_published', true)
                ->latest('published_at')
                ->take(4)
                ->get()
                ->map(fn (BlogPost $post) => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'excerpt' => $post->excerpt,
                    'image' => $post->image,
                    'date' => $post->published_at->format('M j, Y'),
                    'category' => $post->category,
                ]),
        ]);
    }
}