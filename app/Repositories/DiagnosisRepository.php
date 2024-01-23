<?php

namespace App\Repositories;

use App\Interface\DiagnosisRepositoryInterface;
use App\Models\Diagnosis;
use App\Models\PatientEntry;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Repositories\RoomRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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

    public function getTopDiagnoses()
    {
        $rooms = Room::select('id','name');
        $diagnoses = PatientEntry::select(DB::raw("COUNT(*) AS total, diagnose_id"))
            ->whereNotNull('diagnose_id')
            ->groupBy('diagnose_id')
            ->orderBy('total', 'DESC')
            ->with('diagnose')
            ->limit(10)
            ->get();

        $totals = [];
        $names = [];

        foreach($diagnoses as $diagnose) {
            $totals[] = $diagnose->total;
            $names[] = $diagnose->diagnose->name;
        }

        return (object) [
            'totals' => $totals,
            'names' => $names,
            'diagnoses' => $diagnoses,
        ];
    }
}
