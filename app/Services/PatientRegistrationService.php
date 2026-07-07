<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PatientRegistrationService
{
    public function register(array $data): User
    {
        return DB::transaction(function () use ($data) {

            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
                'password'   => $data['password'],
                'role'       => 'patient',
            ]);

            Patient::create([
                'user_id' => $user->id,
                'phone' => $data['phone'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
            ]);

            return $user;
        });
    }
}