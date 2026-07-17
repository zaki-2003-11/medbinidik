<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with([
            'appointment.doctor.user',
            'appointment.doctor.specialty'
        ])
        ->whereHas('appointment', function ($query) {

            $query->where(
                'patient_id',
                auth()->user()->patient->id
            );

        })
        ->latest()
        ->get();

        return view(
            'patient.consultations.index',
            compact('consultations')
        );
    }

    public function show(Consultation $consultation)
    {
        abort_if(
            $consultation->appointment->patient_id != auth()->user()->patient->id,
            403
        );

        $consultation->load([
            'appointment.doctor.user',
            'appointment.doctor.specialty'
        ]);

        return view(
            'patient.consultations.show',
            compact('consultation')
        );
    }
}