<?php

namespace App\Services;

use App\Models\PatientEntry;

class MedicService
{
    public static function getLongCare(PatientEntry $entry)
    {
        if(!$entry->out_date) return 0;
        return $entry->date->diffInDays($entry->out_date);
    }
}
