<?php

declare(strict_types=1);

namespace App\Services\Auth;

use Inertia\Inertia;
use Inertia\Response;

class LoginFormShowService
{
    public function showLoginForm(): Response
    {
        return Inertia::render('Home/LoginForm');
    }
}