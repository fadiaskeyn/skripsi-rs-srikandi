<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn() => to_route('login'));

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => redirect_role())->name('dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/ruangan', function(){
        return view('pages.ruangan.index');
    });
    Route::get('/ruangan/create', function(){
        return view('pages.ruangan.create');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
