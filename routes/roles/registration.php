<?php

use App\Http\Controllers\Registration\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', fn() => "Hello world")
    ->name('dashboard');

Route::resource('histori', PatientController::class);

Route::resource('patient-entry', \App\Http\Controllers\Registration\PatientEntryController::class)
        ->only( 'create', 'store');

Route::get('patient-exit', function () {
    return view('pages.registration.patient-exit');
})->name('patients.exit');

