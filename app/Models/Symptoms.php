<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptoms extends Model
{
    public function medicalRecords()
    {
        return $this->belongsToMany(Medical_Record::class, 'mr_symptom', 'symptom_id', 'medical_record_id');
    }
}
