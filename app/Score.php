<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table='scores';
    protected $fillable = ['student_id', 'subject_id', 'avr1', 'avr2', 'avr3'];
    public $timestamps = true;
    public function student () {
        return $this->belongsTo("App\Student");
    }
    public function subject () {
        return $this->belongsTo("App\Subject");
    }
}
