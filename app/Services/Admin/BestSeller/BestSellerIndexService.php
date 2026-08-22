<?php

declare(strict_types=1);

namespace App\Services\Admin\BestSeller;

use App\Models\BestSeller;
use Inertia\Inertia;
use Inertia\Response;

class BestSellerIndexService
{
    public function show(): Response
    {
        return Inertia::render('Admin/BestSellers/Index', [
            'bestSellers' => BestSeller::query()
                ->with('product')
                ->orderBy('position')
                ->get(),
        ]);
    }
}
