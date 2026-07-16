<?php

namespace App\Services;

use App\Models\Appointment;

class DoctorAppointmentService
{
    public function getAll($doctorId, $search = null, $status = null)
    {
        return Appointment::with(['patient.user'])
            ->where('doctor_id', $doctorId)

            ->when($search, function ($query) use ($search) {

                $query->whereHas('patient.user', function ($q) use ($search) {

                    $q->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%");

                });

            })

            ->when($status, function ($query) use ($status) {

                $query->where('status', $status);

            })

            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->paginate(10);
    }

    public function find($id)
    {
        return Appointment::with([
            'patient.user',
            'doctor.user',
            'location'
        ])->findOrFail($id);
    }

    public function confirm(Appointment $appointment)
    {
        $appointment->update([

            'status' => 'confirmed',

            'confirmed_at' => now(),

        ]);
    }

    public function reject(Appointment $appointment)
    {
        $appointment->update([

            'status' => 'rejected',

            'cancelled_at' => now(),

        ]);
    }
}