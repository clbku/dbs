<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';
    protected $fillable = ['datetime', 'author_id', 'image', 'title', 'description', 'content', 'comment_id'];
    public $timestamps = true;
    public function account () {
        return $this->belongsTo('App\Account');
    }
    public function comment () {
        return $this->hasMany('App\Comment');
    }
}
