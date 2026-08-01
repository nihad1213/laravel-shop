<?php

declare(strict_types=1);

namespace App\Services\Home;

use Inertia\Inertia;
use Inertia\Response;

class RegisterFormShowService
{
    public function showRegisterForm(): Response
    {
        return Inertia::render('Home/RegisterForm');
    }
}