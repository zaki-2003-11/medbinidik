<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [

        'reference',

        'appointment_id',

        'chief_complaint',

        'symptoms',

        'diagnosis',

        'blood_pressure',

        'heart_rate',

        'temperature',

        'respiratory_rate',

        'oxygen_saturation',

        'weight',

        'height',

        'bmi',

        'doctor_notes',

        'follow_up_required',

        'next_visit_date',

    ];

    protected $casts = [

        'follow_up_required' => 'boolean',

        'next_visit_date' => 'date',

    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
