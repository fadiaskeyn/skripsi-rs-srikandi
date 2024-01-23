<?php

namespace App\Http\Controllers\Registration;

use App\Models\PatientEntry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\PatientEntryRequest;
use App\Http\Resources\PatientEntryResource;
use App\Models\{Diagnosis, Patient, Payment, Room, Service};
use App\Repositories\PatientEntryRepository;
use App\Repositories\PatientRepository;

class PatientEntryController extends Controller
{

    protected PatientEntryRepository $patientEntryRepository;

    public function __construct()
    {
        $this->patientEntryRepository = new PatientEntryRepository;
        $this->patientRepo = new PatientRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.registrasi.patient-entry',[
            'payments' => Payment::pluck('name', 'id')->toArray(),
            'services' => Service::pluck('name', 'id')->toArray(),
            'rooms' => Room::pluck('name', 'id')->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientEntryRequest $request)
{
    $patient = Patient::where('medrec_number', $request->medrec_number)->first();

    // Check if the patient with the same 'medrec_number' has an 'entry' status
    $existingEntry = PatientEntry::join('patients', 'patients.id', '=', 'patient_entries.patient_id')
        ->where('patients.medrec_number', $request->medrec_number)
        ->where('patient_entries.status_patient', 'entry')
        ->first();

    // If an existing entry with 'entry' status is found, show an alert
    if ($existingEntry) {
        return back()->withErrors(['error' => 'Pasien dengan status "entry" sudah terdaftar.'])->withInput();
    }

    $data = $request->validated();
    $data['patient_id'] = $patient->id;

    (new PatientEntryRepository)->create($data);

    return back()->with('swals', 'Berhasil mendaftarkan pasien');
}



    /**
     * Display the specified resource.
     */
    public function show($medrec)
    {
        $patient = Patient::where('medrec_number', $medrec)->first();
        $entry = PatientEntry::where('patient_id', $patient->id)
            ->where('status_patient', 'entry')
            ->latest()
            ->first();

        if(!$entry) return abort(404);

        return PatientEntryResource::make($entry);
    }

// app/Http/Controllers/Registration/PatientEntryController.php
public function historipatient($medrec_number)
{
    $patient = Patient::where('medrec_number', $medrec_number)->first();

    if (!$patient) {
        abort(404, 'Pasien tidak ditemukan');
    }

    $historiEntries = $this->patientEntryRepository->historipatient($patient->id);

    return view('pages.registrasi.history.historipatient', compact('historiEntries'));
}



public function allpatient()
{
    // $patients = Patient::get();
    // $historiEntries = $this->patientEntryRepository->all_patient();
    return view('pages.registrasi.data-patient', ['patients' => $this->patientEntryRepository->all_patient()]);
}

public function datapasienmasuk(){

    return view('pages.registrasi.patientmasuk',['data' => $this->patientRepo->getData(),]);
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientEntry $patientEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientEntry $patientEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientEntry $patientEntry)
    {
        //
    }
}
