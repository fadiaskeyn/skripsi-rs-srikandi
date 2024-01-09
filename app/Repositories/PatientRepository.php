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
    $query = PatientEntry::join('rooms', 'patient_entries.room_id', '=', 'rooms.id')
        ->join('patients', 'patient_entries.patient_id', '=', 'patients.id')
        ->select(
            'patient_entries.id',
            'patients.medrec_number',
            'patients.fullname',
            'patients.birthdate',
            'patients.gender',
            'rooms.name as room_name',
            'patient_entries.status_patient'
        );

    if (request('searchInput')) {
        $query->where('patients.fullname', 'like', '%' . request('searchInput') . '%');
    }

    return $query->get()->toArray();
}


}

