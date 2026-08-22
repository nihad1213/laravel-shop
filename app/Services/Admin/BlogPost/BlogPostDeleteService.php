<?php

declare(strict_types=1);

namespace App\Services\Admin\BlogPost;

use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;

class BlogPostDeleteService
{
    public function delete(BlogPost $blogPost): RedirectResponse
    {
        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog post deleted.');
    }
}
