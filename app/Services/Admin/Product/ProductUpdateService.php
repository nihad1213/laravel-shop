<?php

declare(strict_types=1);

namespace App\Services\Admin\Product;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductUpdateService
{
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
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

        if ($validated['title'] !== $product->title) {
            $validated['slug'] = $this->uniqueSlug($validated['title'], $product->id);
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    private function uniqueSlug(string $title, int $ignoreId): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $suffix = 1;

        while (Product::query()->where('slug', $slug)->where('id', '!=', $ignoreId)->exists()) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
