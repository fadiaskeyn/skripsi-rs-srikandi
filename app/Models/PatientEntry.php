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
        'status_patient',
        'out_date',
        'way_out',
        'dpjb',
        'diagnose_id',
    ];

    protected $casts = [
        'date' => 'datetime:Y-m-d\TH:i:s.u\Z',
        'out_date' => 'date',
    ];

    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function diagnose()
    {
        return $this->belongsTo(Diagnosis::class, 'diagnose_id', 'id');
    }
}
