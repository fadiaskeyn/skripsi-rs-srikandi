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

if(!function_exists('enumArray')) {
    function enumArray(string $enum) {
        $reflection = new ReflectionEnum($enum);
        $constants = $reflection->getConstants();

        $enumArray = [];
        foreach ($constants as $case)
            $enumArray[$case->value] = $case->value;

        return $enumArray;
    }
}
