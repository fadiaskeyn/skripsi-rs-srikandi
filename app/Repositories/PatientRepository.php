<?php

namespace App\Repositories;

use App\Interface\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Support\Collection;

class PatientRepository implements PatientRepositoryInterface
{
    public function getData(): array
    {
        return Patient::select('id', 'medrec_number', 'fullname', 'birthdate', 'gender', 'address')->get()->toArray();
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
}
