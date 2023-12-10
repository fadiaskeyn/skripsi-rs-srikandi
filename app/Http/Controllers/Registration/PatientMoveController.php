<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\PatientMoveRequest;
use App\Models\PatientEntry;
use App\Models\PatientMove;
use App\Models\Payment;
use App\Models\Room;
use App\Models\Service;
use App\Repositories\PatientMoveRepository;
use Illuminate\Http\Request;

class PatientMoveController extends Controller
{
    public function create()
    {
        return view('pages.registrasi.patient-move', [
            'payments' => Payment::pluck('name', 'id')->toArray(),
            'services' => Service::pluck('name', 'id')->toArray(),
            'rooms' => Room::pluck('name', 'id')->toArray(),
            'movingPatients' => PatientMove::all(),
        ]);
    }

    public function store(PatientMoveRequest $request)
    {
        $entryData = PatientEntry::findOrFail($request->entry_id);
        PatientMoveRepository::addMovingPatient($entryData, $request->validated());

        return back()->with('swals', 'Berhasil memindahkan pasien');
    }
}
