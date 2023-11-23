<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserRequest extends FormRequest
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
        $data = [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'employee_number' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
                    ->ignore($this->user),
            ],
            'username' => [
                'required',
                'alpha_dash',
                Rule::unique('users', 'username')
                    ->ignore($this->user),
            ],
            'role' => 'required|exists:roles,name',
            'password' => 'nullable|string|min:8',
            'role' => 'nullable|exists:roles,name',
        ];

        if($this->isMethod('POST')) {
            $data['password'] = 'required|string|min:8';
            $data['role'] = 'required|exists:roles,name';
        }

        return $data;
    }
}
