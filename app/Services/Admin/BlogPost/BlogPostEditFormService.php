<?php

declare(strict_types=1);

namespace App\Services\Admin\BlogPost;

use App\Models\BlogPost;
use Inertia\Inertia;
use Inertia\Response;

class BlogPostEditFormService
{
    public function show(BlogPost $blogPost): Response
    {
        return Inertia::render('Admin/BlogPosts/Edit', [
            'blogPost' => $blogPost,
        ]);
    }
}
