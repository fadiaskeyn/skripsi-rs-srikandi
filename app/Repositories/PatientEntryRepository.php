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
            'patient_id' => $data['patient_id'],
            'date' => $data['date'],
            'new_patient' => $data['new_patient'],
            'nursing_class' => $data['nursing_class'],
            'service_id' => $data['service_id'],
            'payment_id' => $data['payment_id'],
            'room_id' => $data['room_id'],
            'status_patient' => 'entry'
        ]);
    }
}
