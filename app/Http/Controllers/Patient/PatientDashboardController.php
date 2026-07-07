<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;

class PatientDashboardController extends Controller
{
    public function index()
    {
        return view('patient.dashboard');
    }
}