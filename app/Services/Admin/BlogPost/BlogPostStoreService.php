<?php

declare(strict_types=1);

namespace App\Services\Admin\BlogPost;

use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostStoreService
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validate($request);

        BlogPost::create([
            ...$validated,
            'slug' => $this->uniqueSlug($validated['title']),
        ]);

        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog post created.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validate(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string'],
            'image' => ['nullable', 'string', 'max:2048'],
            'published_at' => ['required', 'date'],
            'is_published' => ['boolean'],
        ]);
    }

    private function uniqueSlug(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $suffix = 1;

        while (BlogPost::query()->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
