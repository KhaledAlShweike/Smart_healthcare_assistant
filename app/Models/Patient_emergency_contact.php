<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient_emergency_contact extends Model
{
   public function Patient()
   {
    return $this->belongsTo(Patient::class);
   }
}
