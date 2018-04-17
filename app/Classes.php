<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table='classes';
    protected $fillable = ['study_address', 'level', 'begin_at', 'student_num', 'shift', 'tutor_id', 'subject_id', 'state'];
    public $timestamps = true;
    public function tutor () {
        return $this->belongsTo('App\Tutor');
    }
    public function study () {
        return $this->hasMany('App\Study');
    }
    public function exam () {
        return $this->hasMany('App\Exam');
    }
    public function subject () {
        return $this->belongsTo('App\Subject');
    }
}
