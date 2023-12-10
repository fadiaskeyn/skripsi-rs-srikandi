<?php

namespace App\Http\Requests\Registration;

use App\Enums\PatientWayout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientExitRequest extends FormRequest
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
            'entry_id' => 'required|numeric|exists:patient_entries,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'way_out' => [
                'required',
                Rule::enum(PatientWayout::class),
            ],
            'dpjb' => 'required|string',
        ];
    }
}
