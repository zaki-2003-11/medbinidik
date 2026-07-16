<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Services\ConsultationService;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function __construct(
        protected ConsultationService $consultationService
    ) {}

    public function create(Appointment $appointment)
    {
        abort_if(
            $appointment->doctor_id !== auth()->user()->doctor->id,
            403
        );

        return view(
            'doctor.consultations.create',
            compact('appointment')
        );
    }

    public function store(Request $request, Appointment $appointment)
    {
        abort_if(
            $appointment->doctor_id !== auth()->user()->doctor->id,
            403
        );

        $validated = $request->validate([

            'chief_complaint' => 'required|string',

            'symptoms' => 'nullable|string',

            'diagnosis' => 'required|string',

            'doctor_notes' => 'nullable|string',

            'blood_pressure' => 'nullable|string|max:20',

            'heart_rate' => 'nullable|integer|min:20|max:250',

            'temperature' => 'nullable|numeric|min:30|max:45',

            'respiratory_rate' => 'nullable|integer|min:5|max:80',

            'oxygen_saturation' => 'nullable|integer|min:0|max:100',

            'weight' => 'nullable|numeric|min:1|max:500',

            'height' => 'nullable|numeric|min:30|max:300',

            'follow_up_required' => 'nullable|boolean',

            'next_visit_date' => 'nullable|date',

        ]);

        $validated['follow_up_required'] =
            $request->has('follow_up_required');

        $this->consultationService->create(
            $appointment,
            $validated
        );

        return redirect()
            ->route('doctor.appointments.index')
            ->with(
                'success',
                'Consultation saved successfully.'
            );
    }
}
