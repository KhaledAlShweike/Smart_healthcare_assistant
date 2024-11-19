<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vital_sign extends Model
{
    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
