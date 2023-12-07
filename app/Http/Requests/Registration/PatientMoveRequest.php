<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class PatientMoveRequest extends FormRequest
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
            'entry_id' => 'required|exists:patient_entries,id',
            'moving_room' => 'required|exists:rooms,id',
            'nursing_class' => 'required|in:1,2,3',
            'payment_id' => 'required|exists:payments,id',
            'date' => 'required|date',
        ];
    }
}
