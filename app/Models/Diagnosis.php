<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diagnosis extends Model
{
    use HasFactory;
    
    public function medicalRecords()
    {
        return $this->belongsToMany(Medical_Record::class, 'alter_medical_record_symptom', 'diagnosis_id', 'medical_record_id');
    }
}
