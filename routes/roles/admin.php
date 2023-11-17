<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('pengguna', App\Http\Controllers\Admin\UserController::class);
Route::resource('room', App\Http\Controllers\Admin\RoomController::class);
Route::resource('service', App\Http\Controllers\Admin\ServiceController::class);

Route::controller(App\Http\Controllers\Admin\ChartController::class)
    ->group(function(){

        Route::get('kunjungan', 'visit')->name('chart.visit');
        Route::get('rawat-inap', 'inpatient')->name('chart.inpatient');
        Route::get('barber-johnson', 'barberJohnson')->name('chart.barber-johnson');
    });