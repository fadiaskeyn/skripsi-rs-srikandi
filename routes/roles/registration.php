<?php

use App\Http\Controllers\Registration\DashboardController;
use App\Http\Controllers\Registration\PatientController;
use App\Http\Controllers\Registration\PatientEntryController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', DashboardController::class)
    ->name('dashboard');

Route::resource('histori', PatientController::class);

Route::resource('patient-entry', PatientEntryController::class)
        ->only('create', 'store', 'show');

Route::get('patient-exit', function () {
    return view('pages.registrasi.patient-exit');
})->name('patient-exit.create');
