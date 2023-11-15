<?php

use Illuminate\Support\Facades\Route;

Route::get('pasien-masuk', function () {
    return view('pages.registrasi.pasien-masuk');
});

Route::get('pasien-keluar', function () {
    return view('pages.registrasi.pasien-keluar');
});
