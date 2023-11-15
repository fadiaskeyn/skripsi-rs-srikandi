<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('pengguna', App\Http\Controllers\Admin\UserController::class);
