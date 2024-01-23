<?php

namespace App\Http\Controllers\Admin;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\DiagnosisRepository;

class DiagnosisController extends Controller
{

    protected DiagnosisRepository $diagnosisRepository;

    public function __construct()
    {
        $this->diagnosisRepository = new DiagnosisRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.diagnosis.index', [
            'diagnosis' => $this->diagnosisRepository->getData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       return $this->diagnosisRepository->save($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $diagnosis = DiagnosisRepository::getFind($id);
        return response()->json([
            'data' => $diagnosis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      return $this->diagnosisRepository->destroy($id);
    }
}
