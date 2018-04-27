<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyRegister extends Model
{
    protected $table = 'study_registers';
    protected $fillable = [
        'id', 'name', 'dob', 'address','hometown','sex','phone','school','class_s','shift','subject_id','tutor_id'
    ];
}
