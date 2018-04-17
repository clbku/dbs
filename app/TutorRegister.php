<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorRegister extends Model
{
    protected $table='tutor_registers';
    protected $fillable = ['name', 'dob', 'address', 'hometown', 'sex', 'phone', 'school', 'email', 'specializes', 'achievements'];
    public $timestamps = true;
}
