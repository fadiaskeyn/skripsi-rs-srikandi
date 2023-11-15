<?php

use App\Http\Controllers\Registration\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', fn() => "Hello world")
    ->name('dashboard');

Route::resource('histori', PatientController::class);

Route::get('pasien-masuk', function () {
    return view('pages.registrasi.pasien-masuk');
})->name('pasien-masuk');;

Route::get('pasien-keluar', function () {
    return view('pages.registrasi.pasien-keluar');
})->name('pasien-keluar');
