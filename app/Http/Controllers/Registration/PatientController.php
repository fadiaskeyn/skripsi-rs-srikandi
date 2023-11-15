<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\PatientRequest;
use App\Repositories\PatientRepository;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private PatientRepository $patientRepo;

    public function __construct()
    {
        $this->patientRepo = new PatientRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.registrasi.history.index', [
            'data' => $this->patientRepo->getData(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.registrasi.history.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $this->patientRepo->create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
