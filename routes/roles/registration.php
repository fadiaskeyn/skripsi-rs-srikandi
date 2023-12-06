<?php

use App\Http\Controllers\Registration\DashboardController;
use App\Http\Controllers\Registration\PatientController;
use App\Http\Controllers\Registration\PatientEntryController;
use App\Http\Controllers\Registration\PatientExitController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', DashboardController::class)
    ->name('dashboard');

Route::resource('histori', PatientController::class);

Route::resource('patient-entry', PatientEntryController::class)
    ->only('create', 'store', 'show');

Route::resource('patient-exit', PatientExitController::class)
    ->only('create', 'store');

Route::view('/pasien-pindah', 'pages.registrasi.patient-move')->name('patient-move');
