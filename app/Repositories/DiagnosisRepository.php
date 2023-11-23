<?php

namespace App\Repositories;

use App\Interface\DiagnosisRepositoryInterface;
use App\Models\Diagnosis;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class DiagnosisRepository implements DiagnosisRepositoryInterface
{
    public function getData(): Collection
    {
        return Diagnosis::select('id', 'code_diagnosis', 'name')->get();
    }


    public function save(Request $request)
    {
        $diagnosa = Diagnosis::updateOrCreate(['code_diagnosis' => $request->code_diagnosis], $request->all());
        return response()->json([
            'data' => $diagnosa
        ]);
    }
    public function destroy(int $id): JsonResponse
    {
         $diagnosis = self::getFind($id);
         $diagnosis->delete();
         return response()->json(['success'=>'Data Diagnosa berhasil dihapus']);
    }

    public static function getFind(int $id)
    {
        return Diagnosis::findOrFail($id);
    }
}
