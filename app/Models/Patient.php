<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
class Patient extends Model
{
    use HasApiTokens, Notifiable;

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

    public function VitalSigns()
    {
        return $this->hasMany(Vital_sign::class);
    }
}
