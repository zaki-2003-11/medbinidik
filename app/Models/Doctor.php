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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
