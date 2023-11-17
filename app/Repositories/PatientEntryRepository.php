<?php

namespace App\Repositories;

use App\Interface\PatientEntryRepositoryInterface;
use App\Models\PatientEntry;

class PatientEntryRepository implements PatientEntryRepositoryInterface
{
    public function getData(): array
    {
        return PatientEntry::select('id', 'medrec_number', 'fullname', 'birthdate', 'gender', 'address')->get()->toArray();
    }

    public function create(array $data): PatientEntry
    {
        return PatientEntry::create([
            // 'medrec_number' => $data['medrec_number'],
            // 'fullname' => $data['fullname'],
            // 'birthdate' => $data['birthdate'],
            // 'gender' => $data['gender'],
            // 'address' => $data['address'],
        ]);
    }
}
