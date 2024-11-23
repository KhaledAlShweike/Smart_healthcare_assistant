<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    
    public function Tenant()
    {
        return $this->belongsToMany(Tenant::class , "doctor_tenant","doctor_id","tenant_id");
    }

    public function MedicalRecords()
    {
        return $this->hasMany(Medical_record::class);
    }
}
