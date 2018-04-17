<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table='accounts';
    protected $fillable = ['username', 'state', 'user_id'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = true;
    public function user () {
        return $this->belongsTo('App\User');
    }
    public function post () {
        return $this->hasMany('App\Post');
    }
    public function news () {
        return $this->hasMany('App\News');
    }
    public function exercise () {
        return $this->hasMany('App\Exercise');
    }
    public function comment () {
        return $this->hasMany('App\Comment');
    }
}
