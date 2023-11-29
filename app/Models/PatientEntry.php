<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'date',
        'new_patient',
        'nursing_class',
        'service_id',
        'payment_id',
        'room_id',
    ];

    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
