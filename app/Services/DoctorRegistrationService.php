<?php

namespace App\Services;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorRegistrationService
{
    public function register(array $data): User
    {
        return DB::transaction(function () use ($data) {

            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
                'password'   => $data['password'],
                'role'       => 'doctor',
            ]);

            Doctor::create([
                'user_id'              => $user->id,
                'specialty_id'         => $data['specialty_id'],
                'phone'                => $data['phone'],
                'gender'               => $data['gender'],
                'date_of_birth'        => $data['date_of_birth'],
                'national_id'          => $data['national_id'],
                'license_number'       => $data['license_number'],
                'years_experience'     => $data['years_experience'],
                'consultation_fee'     => $data['consultation_fee'],
                'approval_status'      => 'pending',
            ]);

            return $user;
        });
    }
}