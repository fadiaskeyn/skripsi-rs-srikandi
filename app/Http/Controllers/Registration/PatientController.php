<?php

namespace App\Http\Controllers\Registration;
use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\PatientRequest;
use App\Http\Requests\Registration\PatientEntryRequest;
use App\Repositories\PatientRepository;
use App\Models\{Diagnosis, Patient, PatientEntry, Payment, Room, Service};
use App\Repositories\PatientEntryRepository;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    protected PatientRepository $patientRepo;
    protected PatientEntryRepository $patientEntryRepo;

    public function __construct()
    {
        $this->patientRepo = new PatientRepository;
        $this->patientEntryRepo = new PatientEntryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.registrasi.history.index', ['data' => $this->patientRepo->getData(),]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.registrasi.history.create',['payments' => Payment::pluck('name', 'id')->toArray(),
        'services' => Service::pluck('name', 'id')->toArray(),
        'rooms' => Room::pluck('name', 'id')->toArray(),]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $this->patientRepo->create($request->all());
        $this->patientEntryRepo->create($request->all());
        

        // Check if the patient with the same 'medrec_number' has an 'entry' status
        $existingEntry = PatientEntry::join('patients', 'patients.id', '=', 'patient_entries.patient_id')
            ->where('patients.medrec_number', $request->medrec_number)
            ->where('patient_entries.status_patient', 'entry')
            ->first();

        // If an existing entry with 'entry' status is found, show an alert
        if ($existingEntry) {
            return back()->withErrors(['error' => 'Pasien dengan status "entry" sudah terdaftar.'])->withInput();
        }


        return back()->with('swals', 'Berhasil mendaftarkan pasien');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ...
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->toArray();

        return view('pages.registras.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // ...
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function historipatient(){
        return view('pages.registrasi.history.historipatient',
        ['data' => $this->patientRepo->historipatient()]);
    }

}
