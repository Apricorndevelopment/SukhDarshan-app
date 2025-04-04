<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

// PageController---------------
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('shop', [PageController::class, 'shop'])->name('shop');
Route::get('services', [PageController::class, 'services'])->name('services');
Route::get('blog', [PageController::class, 'blog'])->name('blog');
Route::get('contact', [PageController::class, 'contact'])->name('contact');

// Authentication--------------
// Auth
Route::get('/login', [AuthController::class, 'showloginform'])->name('Auth.login');
Route::get('/register', [AuthController::class, 'showregisterform'])->name('Auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin login
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

// Dashboards (with back-prevention middleware)
Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/user/dashboard', [AuthController::class, 'dashboard'])->name('user.dashboard');
});
