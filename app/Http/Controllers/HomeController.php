<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Home\AboutUsService;
use App\Services\Home\ContactService;
use App\Services\Home\HomeService;
use App\Services\Home\ProductCatalogService;
use Illuminate\Http\Request;
use Inertia\Response;

class HomeController extends Controller
{
    public function __construct(
        private readonly HomeService $homeService,
        private readonly AboutUsService $aboutUsService,
        private readonly ContactService $contactService,
        private readonly ProductCatalogService $productCatalogService,
    ) {}

    public function index(): Response
    {
        return $this->homeService->showHomePage();
    }

    public function products(Request $request): Response
    {
        return $this->productCatalogService->show($request);
    }

    public function aboutUs(): Response
    {
        return $this->aboutUsService->showAboutUsPage();
    }

    public function contact(): Response
    {
        return $this->contactService->showContactPage();
    }
}