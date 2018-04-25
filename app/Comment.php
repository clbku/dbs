<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'id', 'author_id', 'post_id', 'comment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $timestamps = true;
    public function posts () {
        return $this->belongsTo("App\Post");
    }
    public function account () {
        return $this->hasMany("App\Account");
    }
}
