<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'reference',

        'patient_id',

        'doctor_id',

        'doctor_location_id',

        'appointment_date',

        'start_time',

        'end_time',

        'appointment_type',

        'booking_source',

        'reason',

        'status',

        'confirmed_at',

        'completed_at',

        'cancelled_at',

        'cancellation_reason',

    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function location()
    {
        return $this->belongsTo(DoctorLocation::class,'doctor_location_id');
    }

    public function consultation()
    {
        return $this->hasOne(Consultation::class);
    }
}