<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CensusController extends Controller
{
    public function __invoke()
    {
        return view("pages.census.index");
    }
}
