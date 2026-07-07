<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [

            'doctorCount' => Doctor::count(),

            'patientCount' => Patient::count(),

            'appointmentCount' => Appointment::count(),

            'pendingDoctors' => Doctor::where(
                'approval_status',
                'pending'
            )->count(),

        ]);
    }
}