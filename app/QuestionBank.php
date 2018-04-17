<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    protected $table='question_banks';
    protected $fillable = ['type', 'question', 'correct', 'wrong_1', 'wrong_2', 'wrong_3'];
    public $timestamps = true;
    public function question_list () {
        return $this->hasMany('App\QuestionList');
    }
}
