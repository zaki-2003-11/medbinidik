<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = auth()->user()
            ->patient
            ->appointments()
            ->with('doctor.user')
            ->latest()
            ->paginate(10);

        return view(
            'patient.appointments.index',
            compact('appointments')
        );
    }

    public function create(Doctor $doctor)
    {
        $doctor->load('user', 'specialty', 'location');

        return view(
            'patient.appointments.create',
            compact('doctor')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'doctor_id' => 'required|exists:doctors,id',

            'appointment_date' => 'required|date|after_or_equal:today',

            'start_time' => 'required',

            'end_time' => 'required|after:start_time',

            'appointment_type' => 'required',

            'reason' => 'nullable|max:1000',

        ]);

        $doctor = Doctor::with('location')->findOrFail($request->doctor_id);

        Appointment::create([

            'reference' => 'APT-' . now()->format('YmdHis'),

            'patient_id' => auth()->user()->patient->id,

            'doctor_id' => $doctor->id,

            'doctor_location_id' => $doctor->location->id,

            'appointment_date' => $request->appointment_date,

            'start_time' => $request->start_time,

            'end_time' => $request->end_time,

            'appointment_type' => $request->appointment_type,

            'booking_source' => 'patient',

            'reason' => $request->reason,

            'status' => 'pending',

        ]);

        return redirect()
            ->route('patient.appointments.index')
            ->with(
                'success',
                'Appointment booked successfully.'
            );
    }
}