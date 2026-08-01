<?php

declare(strict_types=1);

namespace App\Services\Home;

use Inertia\Inertia;
use Inertia\Response;

class ContactService
{
    public function showContactPage(): Response
    {
        return Inertia::render('Home/ContactPage');
    }
}