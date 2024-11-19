<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vital_sign extends Model
{
    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function Medical_record()
    {
        return $this->belongsTo(Medical_record::class);
    }
}
