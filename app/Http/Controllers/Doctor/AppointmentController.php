<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Services\DoctorAppointmentService;

class AppointmentController extends Controller
{
    public function __construct(
        protected DoctorAppointmentService $appointmentService
    ) {}

    public function index()
    {
        $appointments = $this->appointmentService->getAll(
            auth()->user()->doctor->id,
            request('search'),
            request('status')
        );

        return view(
            'doctor.appointments.index',
            compact('appointments')
        );
    }

    public function show(Appointment $appointment)
    {
        abort_if(
            $appointment->doctor_id !== auth()->user()->doctor->id,
            403
        );

        $appointment = $this->appointmentService->find($appointment->id);

        return view(
            'doctor.appointments.show',
            compact('appointment')
        );
    }

    public function confirm(Appointment $appointment)
    {
        abort_if(
            $appointment->doctor_id !== auth()->user()->doctor->id,
            403
        );

        $this->appointmentService->confirm($appointment);

        return back()->with(
            'success',
            'Appointment confirmed successfully.'
        );
    }

    public function reject(Appointment $appointment)
    {
        abort_if(
            $appointment->doctor_id !== auth()->user()->doctor->id,
            403
        );

        $this->appointmentService->reject($appointment);

        return back()->with(
            'success',
            'Appointment rejected successfully.'
        );
    }
}