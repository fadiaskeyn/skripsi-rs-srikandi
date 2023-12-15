<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');

Route::resource('user', App\Http\Controllers\Admin\UserController::class);
Route::resource('room', App\Http\Controllers\Admin\RoomController::class);
Route::resource('service', App\Http\Controllers\Admin\ServiceController::class);
Route::resource('payment', App\Http\Controllers\Admin\PaymentController::class);
Route::resource('diagnosis', App\Http\Controllers\Admin\DiagnosisController::class);

Route::controller(App\Http\Controllers\Admin\ChartController::class)
    ->group(function(){
        Route::get('kunjungan', 'visit')->name('chart.visit');
        Route::get('rawat-inap', 'inpatient')->name('chart.inpatient');
        Route::get('barber-johnson', 'barberJohnson')->name('chart.barber-johnson');
        Route::get('top-diagnoses', 'topDiagnose')->name('chart.top-diagnoses');
        Route::get('barber-johnson/json', 'barberJohnsonJson')->name('chart.barber-johnson.json');
    });

// Laporan kunjungan rumah sakit
Route::get('hospital-visit-report', [ReportController::class, 'visitors'])
    ->name('reports.hospital-visit');

Route::get('hospital-service-indicator', [ReportController::class, 'indicator'])
    ->name('reports.hospital-service-indicator');

Route::get('report/preview', fn() =>  view('pages.reports.report'))->name('reports.print');

Route::get('/census', App\Http\Controllers\Admin\CensusController::class)
    ->name('reports.census');
