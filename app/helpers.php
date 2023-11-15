<?php

use Illuminate\Support\Facades\Auth;
use Irsyadulibad\LaravelActivehelper\ActiveHelper;

if(!function_exists('redirect_role')) {
    function redirect_role() {
        $user = Auth::user();

        if($user->hasRole('kepala-rm'))
            return redirect()->route('admin.dashboard');

        if($user->hasRole('pendaftaran'))
            return redirect()->route('registration.dashboard');
    }
}
