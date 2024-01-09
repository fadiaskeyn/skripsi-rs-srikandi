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
            'status_patient' => 'entry',
            'diagnose_id' => $data['diagnose_id'],
        ]);
    }

    public function historipatient($patientId): array
    {
        return PatientEntry::join('patients', 'patient_entries.patient_id', '=', 'patients.id')
            ->join('services', 'patient_entries.service_id', '=', 'services.id')
            ->join('diagnoses', 'patient_entries.diagnose_id', '=', 'diagnoses.id')
            ->select(
                'patients.fullname',
                'patient_entries.date',
                'patient_entries.out_date',
                'services.name as service_name',
                'diagnoses.name as diagnose_name',
                'patient_entries.way_out',
                'patient_entries.dpjb'
            )
            ->where('patient_entries.patient_id', $patientId)
            ->where('patient_entries.status_patient', 'exit')
            ->get()
            ->toArray();
    }

    public function all_patient()
    {
        return PatientEntry::join('rooms', 'patient_entries.room_id', '=', 'rooms.id')
            ->join('patients', 'patient_entries.patient_id', '=', 'patients.id')
            ->select(
                'patient_entries.id',
                'patients.medrec_number',
                'patients.fullname',
                'patients.birthdate',
                'patients.gender',
                'rooms.name as room_name',
                'patient_entries.status_patient'
            )
            ->get()
            ->toArray();
    }


}
