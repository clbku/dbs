<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $table = 'accounts';
    protected $fillable = [
        'id', 'username', 'password', 'state', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $timestamps = true;
    public function user () {
        return $this->belongsTo("App\Account");
    }
    public function comment () {
        return $this->hasMany("App\Comment");
    }
}
