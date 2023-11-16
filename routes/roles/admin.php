<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('pengguna', App\Http\Controllers\Admin\UserController::class);

Route::controller(App\Http\Controllers\Admin\ChartController::class)
    ->group(function(){

        Route::get('kunjungan', 'visit')->name('grafik.visit');
        Route::get('rawat-inap', 'inpatient')->name('grafik.inpatient');
        Route::get('barber-johnson', 'barberJohnson')->name('grafik.barber-johnson');
    });
