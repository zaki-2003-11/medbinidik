<?php

namespace App\Services;

use App\Models\User;
use App\Models\Doctor;
use App\Models\DoctorLocation;
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

            $doctor = Doctor::create([
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

            DoctorLocation::create([

                'doctor_id' => $doctor->id,
                'office_name' => $data['office_name'],
                'address' => $data['address'],
                'country' => 'Morocco',
                'region' => $data['region'],
                'province' => $data['province'],
                'city' => $data['city'],
                'zip_code' => null,
                'postal_code' => null,
                'latitude' => 0,
                'longitude' => 0,
                'phone' => $data['office_phone'],
                'is_main' => true,
            ]);

            return $user;
        });
    }
}
