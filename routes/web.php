<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\BeritaController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

Route::redirect('/', '/dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => Inertia::render('Dashboard/Dashboard'))->name('dashboard');

    Route::resource('pengaduan', PengaduanController::class);
    Route::resource('diskusi', DiskusiController::class);
    Route::resource('user', UserController::class);
    Route::resource('berita', BeritaController::class);
    Route::put('pengaduan/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');

    Route::resource('project', ProjectController::class);
    Route::resource('task', TaskController::class);
    // Route::resource('user', UserController::class);
});



Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');


// Route::resource('user', UserController::class);

// Route::middleware(['auth', 'warga'])->group(function () {
//     Route::get('/warga-dashboard', [WargaDashboardController::class, 'index'])->name('warga.dashboard');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
