<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn() => to_route('login'));

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => redirect_role())->name('dashboard');
});

Route::prefix('grafik')->group(function(){
    Route::get('/kunjungan', fn() => view('pages.grafik.kunjungan.index'))->name('grafik.kunjungan');
    Route::get('/barber-jhonson', fn() => view('pages.grafik.barber-jhonson.index'))->name('grafik.barber-jhonson');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
