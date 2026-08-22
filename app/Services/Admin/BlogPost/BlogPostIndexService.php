<?php

declare(strict_types=1);

namespace App\Services\Admin\BlogPost;

use App\Models\BlogPost;
use Inertia\Inertia;
use Inertia\Response;

class BlogPostIndexService
{
    public function show(): Response
    {
        return Inertia::render('Admin/BlogPosts/Index', [
            'blogPosts' => BlogPost::query()->latest('published_at')->get(),
        ]);
    }
}
