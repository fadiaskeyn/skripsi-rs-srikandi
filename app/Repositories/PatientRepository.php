<?php

namespace App\Repositories;

use App\Interface\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Http\Request; // Tambahkan use statement untuk Request
use Illuminate\Support\Collection;

class PatientRepository implements PatientRepositoryInterface
{
    public function getData(): array
{
    $query = Patient::select('id', 'medrec_number', 'fullname', 'birthdate', 'gender', 'address');

    if(request('searchInput')){
        $query->where('fullname', 'like', '%' . request('searchInput') . '%');
    }

    return $query->get()->toArray();
}


    public function create(array $data): Patient
    {
        return Patient::create([
            'medrec_number' => $data['medrec_number'],
            'fullname' => $data['fullname'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'address' => $data['address'],
        ]);
    }

    public function historipatient($patientId)
    {
        return PatientEntry::select('id', 'date', 'new_patient', 'nursing_class', 'service_id', 'payment_id', 'room_id', 'status_patient', 'diagnose_id')
            ->where('patient_id', $patientId)
            ->where('status_patient', 'exit')
            ->get()
            ->toArray();
    }

}

