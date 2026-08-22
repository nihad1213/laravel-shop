<?php

declare(strict_types=1);

namespace App\Services\Admin\BestSeller;

use App\Models\BestSeller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BestSellerStoreService
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id', 'unique:best_sellers,product_id'],
            'position' => ['required', 'integer', 'min:0'],
        ]);

        BestSeller::create($validated);

        return redirect()->route('admin.best-sellers.index')->with('success', 'Added to this week\'s best sellers.');
    }
}
