<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;

class Doctor extends Model
{

    use \Laravel\Passport\HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'photo',
        'role',
        'specialization',
        'clinic_address',
        'tenant_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    // Mutator to hash password automatically
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Illuminate\Support\Facades\Hash::make($value);
    }




    public function Tenant()
    {
        return $this->belongsToMany(Tenant::class, "doctor_tenant", "doctor_id", "tenant_id");
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
