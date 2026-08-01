<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Home\AboutUsService;
use App\Services\Home\ContactService;
use App\Services\Home\HomeService;
use App\Services\Home\LoginFormShowService;
use Inertia\Response;

class HomeController extends Controller
{
    public function __construct(
        private readonly HomeService $homeService,
        private readonly AboutUsService $aboutUsService,
        private readonly ContactService $contactService,
        private readonly LoginFormShowService $loginFormShowService
    ) {}

    public function index(): Response
    {
        return $this->homeService->showHomePage();
    }

    public function aboutUs(): Response
    {
        return $this->aboutUsService->showAboutUsPage();
    }

    public function contact(): Response
    {
        return $this->contactService->showContactPage();
    }

    public function login(): Response
    {
        return $this->loginFormShowService->showLoginForm();
    }
}