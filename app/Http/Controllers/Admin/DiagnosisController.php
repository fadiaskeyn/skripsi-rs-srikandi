<?php

namespace App\Http\Controllers\Admin;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.diagnosis.index', ['diagnosis' => Diagnosis::all()]);
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
        $diagnosa = Diagnosis::create($request->all());
        return response()->json($diagnosa);
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
    public function edit(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {
        $diagnosis->update($request->all());
        return response()->json($diagnosis);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnosis $diagnosis)
    {
        $diagnosis->delete();
        return response()->json(['success'=>'Data Diagnosa berhasil dihapus']);
    }
}
