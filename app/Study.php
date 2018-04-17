<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table='studies';
    protected $fillable = ['class_id', 'student_id'];
    public $timestamps = true;
    public function student () {
        return $this->hasMany("App\Student");
    }
    public function classes () {
        return $this->hasMany("App\Classes");
    }
}
