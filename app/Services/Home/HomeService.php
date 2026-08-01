<?php

declare(strict_types=1);

namespace App\Services\Home;

use Inertia\Inertia;
use Inertia\Response;

class HomeService
{
    public function showHomePage(): Response
    {
        return Inertia::render('Home/HomePage');
    }
}