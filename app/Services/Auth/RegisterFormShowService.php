<?php

declare(strict_types=1);

namespace App\Services\Auth;

use Inertia\Inertia;
use Inertia\Response;

class RegisterFormShowService
{
    public function showRegisterForm(): Response
    {
        return Inertia::render('Home/RegisterForm');
    }
}