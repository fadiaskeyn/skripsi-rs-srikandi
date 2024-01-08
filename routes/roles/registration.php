<?php
use App\Http\Controllers\Registration\DashboardController;
use App\Http\Controllers\Registration\PatientController;
use App\Http\Controllers\Registration\PatientEntryController;
use App\Http\Controllers\Registration\PatientExitController;
use App\Http\Controllers\Registration\PatientMoveController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', DashboardController::class)->name('dashboard');

// Route for 'histori'
Route::resource('histori', PatientController::class);

// Route::get('/historipatient', [PatientEntryController::class], 'historipatient')
//     ->name('patient.historipatient');


Route::get('patient-entry/{medrec_number}/historipatient', [PatientEntryController::class, 'historipatient'])
    ->name('registration.patient-entry.historipatient');

Route::resource('patient-entry', PatientEntryController::class)
    ->only('create', 'store', 'show');

Route::resource('patient-exit', PatientExitController::class)
    ->only('create', 'store');

Route::resource('patient-move', PatientMoveController::class)
    ->only('create', 'store');
