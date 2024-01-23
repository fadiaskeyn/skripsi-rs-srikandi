<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\PatientExitRequest;
use App\Models\PatientEntry;
use App\Models\Payment;
use App\Models\Room;
use App\Models\Service;
use App\Models\Diagnosis;
use Illuminate\Http\Request;

class PatientExitController extends Controller
{
    public function create()
    {
        return view('pages.registrasi.patient-exit', [
            'payments' => Payment::pluck('name', 'id')->toArray(),
            'services' => Service::pluck('name', 'id')->toArray(),
            'rooms' => Room::pluck('name', 'id')->toArray(),
            'diagnoses' => Diagnosis::pluck('name', 'id')->toArray(),
        ]);
    }

    public function store(PatientExitRequest $request)
    {
        $entryData = PatientEntry::findOrFail($request->entry_id);
        $entryData->update([
            'out_date' => "{$request->date} {$request->time}",
            'way_out' => $request->way_out,
            'dpjb' => $request->dpjb,
            'status_patient' => 'exit',
        ]);

        return back()
            ->with('swals', 'Berhasil menyimpan data');
    }
}
