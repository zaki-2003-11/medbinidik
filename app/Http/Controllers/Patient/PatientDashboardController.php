<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;

class PatientDashboardController extends Controller
{
    public function index()
    {
        $patient = auth()->user()->patient;

        $totalAppointments = $patient->appointments()->count();

        $pendingAppointments = $patient->appointments()
            ->where('status', 'pending')
            ->count();

        $confirmedAppointments = $patient->appointments()
            ->where('status', 'confirmed')
            ->count();

        $completedAppointments = $patient->appointments()
            ->where('status', 'completed')
            ->count();

        $nextAppointment = $patient->appointments()
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->first();

        $recentConsultations = \App\Models\Consultation::with([
            'appointment.doctor.user',
            'appointment.doctor.specialty'
        ])
            ->whereHas('appointment', function ($query) use ($patient) {
                $query->where('patient_id', $patient->id);
            })
            ->latest()
            ->take(5)
            ->get();

        return view(
            'patient.dashboard',
            compact(
                'totalAppointments',
                'pendingAppointments',
                'confirmedAppointments',
                'completedAppointments',
                'nextAppointment',
                'recentConsultations'
            )
        );
    }
}
