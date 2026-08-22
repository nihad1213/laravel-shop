<?php

declare(strict_types=1);

namespace App\Services\Admin\BlogPost;

use Inertia\Inertia;
use Inertia\Response;

class BlogPostCreateFormService
{
    public function show(): Response
    {
        return Inertia::render('Admin/BlogPosts/Create');
    }
}
