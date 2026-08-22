<?php

declare(strict_types=1);

namespace App\Services\Admin\BestSeller;

use App\Models\BestSeller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BestSellerUpdateService
{
    public function update(Request $request, BestSeller $bestSeller): RedirectResponse
    {
        $validated = $request->validate([
            'position' => ['required', 'integer', 'min:0'],
        ]);

        $bestSeller->update($validated);

        return redirect()->route('admin.best-sellers.index')->with('success', 'Best seller updated.');
    }
}
