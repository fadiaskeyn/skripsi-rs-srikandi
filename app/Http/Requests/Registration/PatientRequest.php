<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'medrec_number' => ['required', 'numeric', 'digits:6'],
            'fullname' => ['required', 'string'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'in:L,P'],
            'address' => ['required', 'string'],
        ];
    }
}
