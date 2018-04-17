<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table='exercises';
    protected $fillable = ['author_id', 'datetime', 'subject_id	', 'level', 'title', 'description', 'content', 'link', 'comment_id'];
    public $timestamps = true;
    public function account () {
        return $this->belongsTo('App\Account');
    }
    public function comment () {
        return $this->hasMany('App\Comment');
    }

}
