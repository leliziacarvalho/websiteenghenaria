<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicMonografiaController;
use App\Http\Controllers\EstudanteDashboardController;
use App\Http\Controllers\MonografiaController;

// Homepage
Route::get('/', function () {
    return view('home'); // Pastikan resources/views/home.blade.php ada
})->name('home');

// Form Submit Monografia (Public)
Route::get('/monografia/submit', [PublicMonografiaController::class, 'create'])->name('monografia.form');
Route::post('/monografia/submit', [PublicMonografiaController::class, 'store'])->name('monografia.submit');

// History Monografia Estudante (berdasarkan numeru_estudante dari query)
Route::get('/monografia/history', [PublicMonografiaController::class, 'history'])->name('monografia.history');

// Dashboard Estudante (berdasarkan NIM dari query param)
Route::get('/estudante/dashboard', [EstudanteDashboardController::class, 'index'])->name('estudante.dashboard');

// Resource Monografia (CRUD, kecuali index)
Route::resource('monografia', MonografiaController::class)->except(['index']);
