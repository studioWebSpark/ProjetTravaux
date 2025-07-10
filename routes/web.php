<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Pages publiques
Route::get('/home', fn() => Inertia::render('Home'))->name('home');
Route::get('/categories', fn() => Inertia::render('Categories/Index'))->name('categories.index');
Route::get('/categories/{slug}', fn($slug) => Inertia::render('Categories/Show', ['slug' => $slug]))->name('categories.show');
Route::get('/contact', fn() => Inertia::render('Contact'))->name('contact');
Route::get('/cgu', fn() => Inertia::render('Legal/CGU'))->name('legal.cgu');
Route::get('/privacy', fn() => Inertia::render('Legal/Privacy'))->name('legal.privacy');
Route::get('/mentions', fn() => Inertia::render('Legal/Mentions'))->name('legal.mentions');

// Pages protégées (auth)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/user', fn() => Inertia::render('Dashboard/UserDashboard'))->name('dashboard.user');
    Route::get('/dashboard/pro', fn() => Inertia::render('Dashboard/ProDashboard'))->name('dashboard.pro');
    Route::get('/demandes', fn() => Inertia::render('Demandes/Index'))->name('demandes.index');
    Route::get('/demandes/create', fn() => Inertia::render('Demandes/Create'))->name('demandes.create');
    Route::get('/demandes/{id}', fn($id) => Inertia::render('Demandes/Show', ['id' => $id]))->name('demandes.show');
    Route::get('/profile/user', fn() => Inertia::render('Profile/UserProfile'))->name('profile.user');
    Route::get('/profile/pro', fn() => Inertia::render('Profile/ProProfile'))->name('profile.pro');
    Route::get('/messages', fn() => Inertia::render('Messages/Index'))->name('messages.index');
    Route::get('/messages/{id}', fn($id) => Inertia::render('Messages/Show', ['id' => $id]))->name('messages.show');
    Route::get('/devis', fn() => Inertia::render('Devis/Index'))->name('devis.index');
    Route::get('/devis/{id}', fn($id) => Inertia::render('Devis/Show', ['id' => $id]))->name('devis.show');
    Route::get('/avis', fn() => Inertia::render('Avis/Index'))->name('avis.index');
    Route::get('/dashboard-admin', fn() => Inertia::render('Admin/Dashboard'))->name('dashboard.admin');
});
