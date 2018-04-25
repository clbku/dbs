<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'id', 'date', 'author_id', 'title', 'description', 'content', 'images', 'file', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $timestamps = true;
    public function account () {
        return $this->belongsTo("App\Account");
    }
    public function comment () {
        return $this->hasMany("App\Comment");
    }
}
