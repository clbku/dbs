<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $fillable = ['account_id', 'comment'];
    public $timestamps = true;
    public function post () {
        return $this->belongsTo('App\Post');
    }
    public function news () {
        return $this->belongsTo('App\News');
    }
    public function exercise () {
        return $this->belongsTo('App\Exercise');
    }
    public function account () {
        return $this->belongsTo('App\Account');
    }
}
