<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PatientEntryResource;
use App\Models\PatientEntry;
use Illuminate\Http\Request;

class PatientEntryController extends Controller
{

    public function show(PatientEntry $patientEntry)
    {
        PatientEntryResource::make($patientEntry);
    }
}
