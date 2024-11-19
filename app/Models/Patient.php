<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function Tenant()
    {
        return $this->belongsToMany(Doctor::class, 'patient_tenant', 'patient_id', 'tenant_id');
    }


    public function Emergency_contact()
    {
        return $this->hasMany(Patient_emergency_contact::class);
    }

    public function Medical_record()
    {
        return $this->hasMany(Medical_record::class);
    }

    public function VitalSign()
    {
        return $this->hasMany(Vital_sign::class);
    }

    public function Feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    // Doctors through feedback (many-to-many)
    public function Doctor()
    {
        return $this->hasManyThrough(Doctor::class, Feedback::class, 'patient_id', 'id', 'id', 'doctor_id');
    }
}
