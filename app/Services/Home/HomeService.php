<?php

declare(strict_types=1);

namespace App\Services\Home;

use App\Models\BestSeller;
use Inertia\Inertia;
use Inertia\Response;

class HomeService
{
    public function showHomePage(): Response
    {
        return Inertia::render('Home/HomePage', [
            'bestSelling' => BestSeller::query()
                ->with('product')
                ->whereHas('product', fn ($query) => $query->where('is_active', true))
                ->orderBy('position')
                ->get()
                ->pluck('product')
                ->values(),
        ]);
    }
}