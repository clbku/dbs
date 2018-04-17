<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table='exams';
    protected $fillable = ['class_id', 'student_id', 'exam_code', 'date'];
    public $timestamps = true;
    public function student () {
        return $this->belongsTo('App\Student');
    }
    public function classes () {
        return $this->belongsTo('App\Classes');
    }
    public function result () {
        return $this->belongsTo('App\Result');
    }
    public function question_list () {
        return $this->belongsTo('App\QuestionList');
    }
}
