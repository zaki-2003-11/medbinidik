<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialty_id',
        'phone',
        'gender',
        'date_of_birth',
        'national_id',
        'license_number',
        'years_experience',
        'consultation_fee',
        'biography',
        'languages',
        'approval_status',
        'average_rating',
        'is_available',
        'profile_photo',
    ];

    protected $casts = [
        'languages' => 'array',
        'is_available' => 'boolean',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
    public function location()
    {
        return $this->hasOne(DoctorLocation::class);
    }

    public function schedule()
    {
        return $this->hasMany(DoctorSchedule::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
