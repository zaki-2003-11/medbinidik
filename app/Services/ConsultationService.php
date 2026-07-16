<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\Consultation;
use Illuminate\Support\Facades\DB;

class ConsultationService
{
    public function create(Appointment $appointment, array $data)
    {
        return DB::transaction(function () use ($appointment, $data) {

            $height = $data['height'] ?? null;
            $weight = $data['weight'] ?? null;

            $bmi = null;

            if ($height && $weight) {

                $heightInMeters = $height / 100;

                $bmi = round(
                    $weight / ($heightInMeters * $heightInMeters),
                    2
                );
            }

            $consultation = Consultation::create([

                'reference' => '',

                'appointment_id' => $appointment->id,

                'chief_complaint' => $data['chief_complaint'],

                'symptoms' => $data['symptoms'] ?? null,

                'diagnosis' => $data['diagnosis'],

                'blood_pressure' => $data['blood_pressure'] ?? null,

                'heart_rate' => $data['heart_rate'] ?? null,

                'temperature' => $data['temperature'] ?? null,

                'respiratory_rate' => $data['respiratory_rate'] ?? null,

                'oxygen_saturation' => $data['oxygen_saturation'] ?? null,

                'weight' => $weight,

                'height' => $height,

                'bmi' => $bmi,

                'doctor_notes' => $data['doctor_notes'] ?? null,

                'follow_up_required' => $data['follow_up_required'] ?? false,

                'next_visit_date' => $data['next_visit_date'] ?? null,

            ]);

            $consultation->update([

                'reference' => 'CONS-' . str_pad(
                    $consultation->id,
                    6,
                    '0',
                    STR_PAD_LEFT
                ),

            ]);

            $appointment->update([

                'status' => 'completed',

                'completed_at' => now(),

            ]);

            return $consultation;
        });
    }
}