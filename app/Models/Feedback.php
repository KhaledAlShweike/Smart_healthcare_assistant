<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Doctor relationship (many-to-one)
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
