<?php

use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PatientEntryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('patients/{patient:medrec_number}', [PatientController::class, 'show']);
Route::get('patient-entries/{patient:medrec_number}', [PatientEntryController::class, 'show']);
