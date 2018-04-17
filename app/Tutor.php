<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table='tutors';
    protected $fillable = ['specialize', 'achievements', 'user_id', 'point'];
    public $timestamps = true;
    public function user () {
        return $this->belongsTo("App\User");
    }
    public function classes () {
        return $this->hasMany("App\Classes");
    }
    public function subject () {
        return $this->hasMany("App\StudyRegister");
    }
}
