<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'first_name' => 'required|max:255',

            'last_name' => 'required|max:255',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|confirmed|min:8',

            'phone' => 'required|max:20',

            'gender' => 'required|in:male,female',

            'date_of_birth' => 'required|date',

            'specialty_id' => 'required|exists:specialties,id',

            'national_id' => 'required|unique:doctors,national_id',

            'license_number' => 'required|unique:doctors,license_number',

            'years_experience' => 'required|integer|min:0',

            'consultation_fee' => 'required|numeric|min:0',

        ];
    }
}
