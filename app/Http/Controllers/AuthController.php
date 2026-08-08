<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Auth\LoginFormShowService;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterFormShowService;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class AuthController extends Controller
{
    public function __construct(
        private readonly LoginFormShowService $loginFormShowService,
        private readonly RegisterFormShowService $registerFormShowService,
        private readonly LoginService $loginService,
    ){}

    public function loginFormShow(): Response
    {
        return $this->loginFormShowService->showLoginForm();
    }

    public function login(): RedirectResponse
    {
        return $this->loginService->login();
    }

    public function registerFormShow(): Response
    {
        return $this->registerFormShowService->showRegisterForm();
    }
}