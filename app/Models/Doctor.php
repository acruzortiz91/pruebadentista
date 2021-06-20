<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function Doctors(){
        return $this->hasMany(Doctor::class);
    }
}
