<?php

declare(strict_types=1);

namespace App\Services\Admin\BestSeller;

use App\Models\BestSeller;
use Inertia\Inertia;
use Inertia\Response;

class BestSellerEditFormService
{
    public function show(BestSeller $bestSeller): Response
    {
        return Inertia::render('Admin/BestSellers/Edit', [
            'bestSeller' => $bestSeller->load('product'),
        ]);
    }
}
