<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical_record extends Model
{

    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function symptoms()
    {
        return $this->belongsToMany(Symptoms::class, 'mr_symptom', 'medical_record_id', 'symptom_id');
    }
}
