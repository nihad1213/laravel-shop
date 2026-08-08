<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Auth\LoginFormShowService;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterFormShowService;
use App\Services\Auth\RegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class AuthController extends Controller
{
    public function __construct(
        private readonly LoginFormShowService $loginFormShowService,
        private readonly RegisterFormShowService $registerFormShowService,
        private readonly LoginService $loginService,
        private readonly RegisterService $registerService,
    ){}

    public function loginFormShow(): Response
    {
        return $this->loginFormShowService->showLoginForm();
    }

    public function registerFormShow(): Response
    {
        return $this->registerFormShowService->showRegisterForm();
    }

    public function login(Request $request): RedirectResponse
    {
        return $this->loginService->login($request);
    }
    
    public function register(Request $request): RedirectResponse
    {
        return $this->registerService->register($request);
    }
}