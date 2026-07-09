<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialty;
use App\Services\DoctorService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct(
        protected DoctorService $doctorService
    ) {}

    public function index()
    {
        $doctors = $this->doctorService->getAll(
            request('search'),
            request('status'),
            request('specialty')
        );

        $specialties = Specialty::orderBy('name')->get();

        return view(
            'admin.doctors.index',
            compact('doctors', 'specialties')
        );
    }

    public function show(Doctor $doctor)
    {
        $doctor = $this->doctorService->find($doctor->id);

        return view(
            'admin.doctors.show',
            compact('doctor')
        );
    }

    public function approve(Doctor $doctor)
    {
        $this->doctorService->approve($doctor);

        return back()->with(
            'success',
            'Doctor approved successfully.'
        );
    }

    public function reject(Doctor $doctor)
    {
        $this->doctorService->reject($doctor);

        return back()->with(
            'success',
            'Doctor rejected successfully.'
        );
    }
    public function edit(Doctor $doctor)
    {
        $doctor->load('user');

        $specialties = Specialty::orderBy('name')->get();

        return view(
            'admin.doctors.edit',
            compact('doctor', 'specialties')
        );
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([

            'first_name' => 'required',

            'last_name' => 'required',

            'phone' => 'required',

            'specialty_id' => 'required|exists:specialties,id',

            'consultation_fee' => 'required|numeric',

            'years_experience' => 'required|integer',

        ]);

        $doctor->user->update([

            'first_name' => $request->first_name,

            'last_name' => $request->last_name,

        ]);

        $doctor->update([

            'phone' => $request->phone,

            'specialty_id' => $request->specialty_id,

            'consultation_fee' => $request->consultation_fee,

            'years_experience' => $request->years_experience,

        ]);

        return redirect()
            ->route('admin.doctors.index')
            ->with(
                'success',
                'Doctor updated successfully.'
            );
    }
}
