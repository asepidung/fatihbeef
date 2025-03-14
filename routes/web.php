<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Jika user belum login, langsung arahkan ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// Middleware untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute untuk profile pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Termasuk rute bawaan dari Laravel Breeze
require __DIR__ . '/auth.php';
