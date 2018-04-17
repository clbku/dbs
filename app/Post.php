<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable = ['datetime', 'author_id', 'title', 'description', 'content', 'comment_id'];
    public $timestamps = true;
    public function account () {
        return $this->belongsTo('App\Account');
    }
    public function comment () {
        return $this->hasMany('App\Comment');
    }
}
