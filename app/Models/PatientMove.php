<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMove extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'patient_entry_id',
        'initial_room',
        'moving_room',
        'initial_payment',
        'moving_payment',
        'initial_nursing_class',
        'moving_nursing_class',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function entry()
    {
        return $this->belongsTo(PatientEntry::class, 'patient_entry_id');
    }

    public function initialRoom()
    {
        return $this->belongsTo(Room::class, 'initial_room');
    }

    public function movingRoom()
    {
        return $this->belongsTo(Room::class, 'moving_room');
    }
}
