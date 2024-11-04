<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voice_record extends Model
{
    public function Medical_records()
    {
        return $this->belongsTo(Medical_record::class);
    }
}
