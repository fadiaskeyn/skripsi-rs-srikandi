<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientEntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'patient' => PatientResource::make($this->patient),
            'service' => ServiceResource::make($this->service),
            'payment' => PaymentResource::make($this->payment),
            'room' => RoomResource::make($this->room),
            'entry_date' => $this->date->format('Y-m-d'),
            'new_patient' => $this->new_patient,
            'nursing_class' => $this->nursing_class,
            'status_patient' => $this->status_patient,
            'out_date' => $this->out_date,
            'way_out' => $this->way_out,
            'dpjb' => $this->dpjb
        ];
    }
}
