<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorRegister extends Model
{
    protected $table = 'tutor_registers';
    protected $fillable = [
        'id', 'name', 'dob', 'address','hometown','sex','phone','email','school','specialize_id','achievements','created_at',"updated_at"
    ];
}
