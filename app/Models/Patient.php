<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'gender',
        'date_of_birth',
        'blood_group',
        'height',
        'weight',
        'allergies',
        'emergency_contact_name',
        'emergency_contact_phone',
        'guardian_name',
        'guardian_phone',
        'relationship_to_guardian',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
