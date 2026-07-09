<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialty;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user', 'specialty')
            ->where('approval_status', 'approved')
            ->when(request('search'), function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('first_name', 'like', '%' . request('search') . '%')
                      ->orWhere('last_name', 'like', '%' . request('search') . '%');
                });
            })
            ->when(request('specialty'), function ($query) {
                $query->where('specialty_id', request('specialty'));
            })
            ->paginate(9);

        $specialties = Specialty::orderBy('name')->get();

        return view(
            'patient.doctors.index',
            compact('doctors', 'specialties')
        );
    }

    public function show(Doctor $doctor)
    {
        $doctor->load('user', 'specialty');

        return view(
            'patient.doctors.show',
            compact('doctor')
        );
    }
}