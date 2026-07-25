<?php

declare(strict_types=1);

namespace App\Services\Home;

use Inertia\Inertia;
use Inertia\Response;

class AboutUsService
{
    public function showAboutUsPage(): Response
    {
        return Inertia::render('AboutUsPage');
    }
}