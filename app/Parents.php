<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table='parents';
    protected $fillable = ['name', 'phone', 'student_id', 'title', 'description', 'content', 'comment_id'];
    public $timestamps = true;
    public function student () {
        return $this->belongsTo('App\Student');
    }
}
