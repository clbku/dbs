<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionList extends Model
{
    protected $table='question_lists';
    protected $fillable = ['tn1', 'tn2', 'tn3', 'tn4', 'tn5', 'tn6', 'tn7', 'tn8', 'tn9', 'tn10', 'tl1', 'tl2'];
    public $timestamps = true;
    public function question () {
        return $this->hasMany("App\QuestionBank");
    }
    public function exam () {
        return $this->belongsTo("App\Exam");
    }
}
