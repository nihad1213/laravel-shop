<?php

declare(strict_types=1);

namespace App\Services\Admin\BestSeller;

use App\Models\BestSeller;
use Illuminate\Http\RedirectResponse;

class BestSellerDeleteService
{
    public function delete(BestSeller $bestSeller): RedirectResponse
    {
        $bestSeller->delete();

        return redirect()->route('admin.best-sellers.index')->with('success', 'Removed from this week\'s best sellers.');
    }
}
