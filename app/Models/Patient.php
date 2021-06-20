<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function Patients(){
        return $this->hasMany(Patient::class);
    }
}
