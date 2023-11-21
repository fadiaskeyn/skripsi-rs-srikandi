<?php

namespace App\Repositories;

use App\Interface\DiagnosisRepositoryInterface;
use App\Models\Diagnosis;

class DiagnosisRepository implements DiagnosisRepositoryInterface
{
    public function getData(): array
    {
        return Diagnosis::select('id', 'name')->get()->toArray();
    }

    public function create(array $data): Diagnosis
    {
        return Diagnosis::create([
            'name' => $data['name']
        ]);
    }
    public function update(Diagnosis $diagnosis, array $data): Diagnosis
    {
        $diagnosis->update([
            'name' => $data['name']
        ]);
        
        return $diagnosis;
    }
    public function destroy(Diagnosis $diagnosis): bool 
    {
         return $diagnosis->delete();
    }
}
