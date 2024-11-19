<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{


    public function Tenant()
    {
        return $this->belongsToMany(Tenant::class , "doctor_tenant","doctor_id","tenant_id");
    }

    public function MedicalRecords()
    {
        return $this->hasMany(Medical_record::class);
    }

      // Feedback relationship (one-to-many)
      public function feedbacks()
      {
          return $this->hasMany(Feedback::class);
      }

      // Patients through feedback (many-to-many)
      public function patients()
      {
          return $this->hasManyThrough(Patient::class, Feedback::class, 'doctor_id', 'id', 'id', 'patient_id');
      }

      public function Role()
      {
        return $this->hasMany(Role::class);
      }
}
