<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    
=======
use Illuminate\Notifications\Notifiable;
use App\Models\HasApiTokens;
use Illuminate\Support\Facades\Crypt;

class Doctor extends Model
{
    use HasApiTokens, Notifiable;

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


    public function getPasswordAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Mutator for encrypting the password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Crypt::encrypt($value);
    }

>>>>>>> 11108f1273b7ea9f4965ae82f275cbc6d21399dd
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
