<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Halaman khusus Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/manage-users', function () {
            return view('admin.manage-users'); // Buat file ini nanti
        })->name('manage.users');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/manage-users', [UserController::class, 'index'])->name('manage.users');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/manage-users', [UserController::class, 'index'])->name('manage.users');
    Route::get('/manage-users/create', [UserController::class, 'create'])->name('manage.users.create');
    Route::post('/manage-users', [UserController::class, 'store'])->name('manage.users.store');
    Route::get('/manage-users/{id}/edit', [UserController::class, 'edit'])->name('manage.users.edit');
    Route::put('/manage-users/{id}', [UserController::class, 'update'])->name('manage.users.update');
    Route::delete('/manage-users/{id}', [UserController::class, 'destroy'])->name('manage.users.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
});




// Termasuk rute bawaan dari Laravel Breeze
require __DIR__ . '/auth.php';
