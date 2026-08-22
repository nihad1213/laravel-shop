<?php

declare(strict_types=1);

namespace App\Services\Admin\BlogPost;

use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostUpdateService
{
    public function update(Request $request, BlogPost $blogPost): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string'],
            'image' => ['nullable', 'string', 'max:2048'],
            'published_at' => ['required', 'date'],
            'is_published' => ['boolean'],
        ]);

        if ($validated['title'] !== $blogPost->title) {
            $validated['slug'] = $this->uniqueSlug($validated['title'], $blogPost->id);
        }

        $blogPost->update($validated);

        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog post updated.');
    }

    private function uniqueSlug(string $title, int $ignoreId): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $suffix = 1;

        while (BlogPost::query()->where('slug', $slug)->where('id', '!=', $ignoreId)->exists()) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
