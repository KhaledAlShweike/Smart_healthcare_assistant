<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical_record extends Model
{

    public function Patients()
    {
        return $this->belongsTo(Patient::class);
    }

    public function Symptoms()
    {
        return $this->belongsToMany(Symptoms::class, 'alter_medical_record_symptom', 'medical_record_id', 'symptom_id');
    }

    public function Diagnosis()
    {
        return $this->belongsToMany(Diagnosis::class, 'alter_diagnosis_medical_record', 'medical_record_id', 'diagnosis_id');
    }

    public function Image_Records()
    {
        return $this->hasMany(Image_record::class);
    }

    public function Voice_Records()
    {
        return $this->hasMany(Voice_record::class);
    }

    public function Doctor()
    {
        return $this->hasOne(Doctor::class);
    }

}
