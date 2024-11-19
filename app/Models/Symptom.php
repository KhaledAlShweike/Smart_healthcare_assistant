<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Symptom extends Model
{
    public function medicalRecords(): BelongsToMany
    {
        return $this->belongsToMany(Medical_Record::class, 'alter_medical_record_symptom', 'symptom_id', 'medical_record_id');
    }
}
