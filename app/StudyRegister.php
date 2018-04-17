<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyRegister extends Model
{
    protected $table='study_registers';
    protected $fillable = ['name', 'dob', 'address', 'hometown', 'sex', 'phone', 'school', 'class', 'free_time', 'subject_id', 'tutor_id'];
    public $timestamps = true;
    public function subject () {
        return $this->belongsTo("App\Subject");
    }
    public function tutor () {
        return $this->belongsTo("App\Tutor");
    }
}
