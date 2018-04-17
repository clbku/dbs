<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';
    protected $fillable = ['name', 'dob', 'address', 'hometown', 'sex', 'phone', 'school', 'class', 'avatar'];
    public $timestamps = true;
    public function parents () {
        return $this->hasMany("App\Parents");
    }
    public function study () {
        return $this->hasMany("App\Study");
    }
    public function exam () {
        return $this->hasMany("App\Exam");
    }
    public function score () {
        return $this->belongsTo("App\Score");
    }
}
