<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

Route::get('/', function () {
    $user = auth()->user();

    if ($user) {
        // Utilisateur connecté
        if ($user->role === 'admin') {
            return Inertia::render('Admin/Home');
        } elseif ($user->role === 'artisan' || $user->role === 'pro') {
            return Inertia::render('Pro/Home');
        } else {
            return Inertia::render('Client/Home');
        }
    } else {
        // Visiteur non connecté - page d'accueil avec formulaire
        return Inertia::render('Welcome');
    }
})->name('home');

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
Route::get('/home', function () {
    return Inertia::render('Home');
})->name('home');
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
    // Dashboard admin
    Route::middleware(['auth', 'verified'])->get('/dashboard-admin', function () {
        $users = \App\Models\User::all();
        return Inertia::render('Admin/Dashboard', [
            'auth' => ['user' => auth()->user()],
            'users' => $users
        ]);
    })->name('dashboard.admin');

    // Dashboard pro/artisan
    Route::middleware(['auth', 'verified'])->get('/dashboard/pro', function () {
        return Inertia::render('Dashboard/ProDashboard', [
            'auth' => ['user' => auth()->user()]
        ]);
    })->name('dashboard.pro');

    // Dashboard client
    Route::middleware(['auth', 'verified'])->get('/dashboard/user', function () {
        return Inertia::render('Dashboard/UserDashboard', [
            'auth' => ['user' => auth()->user()]
        ]);
    })->name('dashboard.user');
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
});

// Routes d'authentification personnalisées
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:client,artisan',
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'role' => $validated['role'],
    ]);

    auth()->login($user);

    // Redirection selon le rôle
    if ($user->role === 'artisan') {
        return redirect('/dashboard/pro');
    } elseif ($user->role === 'admin') {
        return redirect('/dashboard-admin');
    } else {
        return redirect('/dashboard/user');
    }
})->middleware('guest');
