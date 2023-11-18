<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('pengguna', App\Http\Controllers\Admin\UserController::class);
Route::resource('room', App\Http\Controllers\Admin\RoomController::class);
Route::resource('service', App\Http\Controllers\Admin\ServiceController::class);
Route::resource('payment', App\Http\Controllers\Admin\PaymentController::class);

Route::get("diagnosa", function() { return view('pages.diagnosa.index'); })->name('admin.diagnosa');

Route::controller(App\Http\Controllers\Admin\ChartController::class)
    ->group(function(){
        Route::get('kunjungan', 'visit')->name('chart.visit');
        Route::get('rawat-inap', 'inpatient')->name('chart.inpatient');
        Route::get('barber-johnson', 'barberJohnson')->name('chart.barber-johnson');
    });

// Laporan kunjungan rumah sakit
Route::get('hospital-visit-report', function (){
    return view('pages.reports.hospital-visit');
})->name('reports.hospital-visit');

Route::get('hospital-service-indicator', function() {
    return view('pages.reports.hospital-service-indicator');
})->name('reports.hospital-service-indicator');
