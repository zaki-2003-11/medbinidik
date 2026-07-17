<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $doctor = auth()->user()->doctor;

        $totalAppointments = $doctor->appointments()->count();

        $pendingAppointments = $doctor->appointments()
            ->where('status', 'pending')
            ->count();

        $todayAppointments = $doctor->appointments()
            ->whereDate('appointment_date', today())
            ->count();

        $completedAppointments = $doctor->appointments()
            ->where('status', 'completed')
            ->count();

        $todaySchedule = $doctor->appointments()
            ->with('patient.user')
            ->whereDate('appointment_date', today())
            ->orderBy('start_time')
            ->get();

        $recentAppointments = $doctor->appointments()
            ->with('patient.user')
            ->latest()
            ->take(5)
            ->get();

        return view(
            'doctor.dashboard',
            compact(
                'totalAppointments',
                'pendingAppointments',
                'todayAppointments',
                'completedAppointments',
                'todaySchedule',
                'recentAppointments'
            )
        );
    }
}