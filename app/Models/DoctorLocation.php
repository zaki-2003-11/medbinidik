<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorLocation extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorLocationFactory> */
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'office_name',
        'address',
        'country',
        'region',
        'province',
        'city',
        'zip_code',
        'postal_code',
        'latitude',
        'longitude',
        'phone',
        'is_main',
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
