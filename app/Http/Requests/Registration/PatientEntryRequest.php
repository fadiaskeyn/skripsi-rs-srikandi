<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class PatientEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'medrec_number' => 'required|exists:patients,medrec_number',
            'new_patient' => 'required|boolean',
            'date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'nursing_class' => 'required|numeric',
            'payment_id' => 'required|exists:payments,id',
            'room_id' => 'required|exists:rooms,id',
        ];
    }
}
