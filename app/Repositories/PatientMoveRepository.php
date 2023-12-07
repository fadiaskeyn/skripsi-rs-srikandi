<?php

namespace App\Repositories;

use App\Models\PatientEntry;
use App\Models\PatientMove;

class PatientMoveRepository
{
    public static function addMovingPatient(PatientEntry $entryData, $data)
    {
        PatientMove::create([
            'patient_id' => $entryData->patient_id,
            'patient_entry_id' => $entryData->id,
            'initial_room' => $entryData->room_id,
            'moving_room' => $data['moving_room'],
            'initial_payment' => $entryData->payment_id,
            'moving_payment' => $data['payment_id'],
            'initial_nursing_class' => $entryData->nursing_class,
            'moving_nursing_class' => $data['nursing_class'],
        ]);

        $entryData->update([
            'room_id' => $data['moving_room'],
            'payment_id' => $data['payment_id'],
            'nursing_class' => $data['nursing_class'],
        ]);

        return $entryData;
    }
}
