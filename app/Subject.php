<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table='subjects';
    protected $fillable = ['name', 'state'];
    public $timestamps = true;
    public function study_register () {
        return $this->hasMany("App\StudyRegister");
    }
    public function score () {
        return $this->hasMany("App\Score");
    }
    public function classes () {
        return $this->hasMany("App\Classes");
    }
}
