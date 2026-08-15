<?php

declare(strict_types=1);

namespace App\Services\Admin\Product;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductStoreService
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validate($request);

        Product::create([
            ...$validated,
            'slug' => $this->uniqueSlug($validated['title']),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validate(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'artist' => ['required', 'string', 'max:255'],
            'format' => ['required', 'string', 'in:Vinyl,CD'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'badge' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:2048'],
            'description' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ]);
    }

    private function uniqueSlug(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $suffix = 1;

        while (Product::query()->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
