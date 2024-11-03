<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
    ];

    public function Patient()
    {
        return $this->belongsToMany(Doctor::class, 'patient_doctor', 'tenant_id', 'patient_id');
    }


    public function Doctor()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_tenant', 'tenant_id', 'doctor_id');
    }

    public function Medical_record()
    {
        return $this->hasMany(Medical_Record::class);
    }

     public function Image_record()
     {
        return $this->hasMany(Image_record::class);
     }

     public function Voice_record()
     {
        return $this->hasMany(Voice_record::class);
     }

     public function Role()
     {
        return $this->hasMany(Role::class);
     }

     public function Prescription()
     {
        return $this->hasMany(Prescription::class);
     }


     public function Laboratory_result()
     {
        return $this->hasMany(Laboratory_result::class);
     }


     public function Feedback()
     {
        return $this->hasMany(Feedback::class);
     }

     public function Medical_history()
     {
        return $this->hasMany(Medical_history::class);
     }

     public function Allergies()
     {
        return $this->hasMany(Allergy::class);
     }

     public function Vital_sign()
     {
        return $this->hasMany(Vital_sign::class);
     }

     public function Procedure()
     {
        return $this->hasMany(Procedure::class);
     }

     public function Immunization()
     {
        return $this->hasMany(Immunization::class);
     }

     public function Patient_emergency_contact()
     {
        return $this->hasMany(Patient_emergency_contact::class);
     }

     public function Medical_note()
     {
        return $this->hasMany(Medical_note::class);
     }

     public function Health_survey()
     {
        return $this->hasMany(Health_survey::class);
     }
}

