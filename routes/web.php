<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DimsumController;
use App\Http\Controllers\MenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Di sinilah kamu mendefinisikan semua route aplikasi Laravel.
| File ini otomatis dimuat oleh RouteServiceProvider.
*/

// Halaman utama (landing page)
Route::get('/', [DimsumController::class, 'dimsum'])->name('landing');
Route::get('/', [DimsumController::class, 'dimsum'])->name('dimsum'); // tambahkan name('dimsum') jika kamu ingin pakai route('dimsum')


// Halaman menu admin (setelah login)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('admin.menu');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('admin.menu.create');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('admin.menu.store');
    Route::get('/menu/edit/{menu}', [MenuController::class, 'edit'])->name('admin.menu.edit');
    Route::post('/menu/update/{menu}', [MenuController::class, 'update'])->name('admin.menu.update');
    Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('admin.menu.delete');
});

// Route untuk profil user (dari Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route bawaan Laravel Breeze untuk auth (login, register, dsb)
require __DIR__.'/auth.php';
