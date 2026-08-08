<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'loginFormShow'])->name('login');
Route::get('/register', [AuthController::class, 'registerFormShow'])->name('register');