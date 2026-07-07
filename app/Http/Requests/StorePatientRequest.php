<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [

        'first_name' => 'required|string|max:255',

        'last_name' => 'required|string|max:255',

        'email' => 'required|email|unique:users,email',

        'password' => 'required|confirmed|min:8',

        'phone' => 'required|max:20',

        'gender' => 'required|in:male,female',

        'date_of_birth' => 'required|date',

    ];
}
}