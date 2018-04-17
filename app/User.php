<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'dob', 'address', 'hometown', 'sex', 'phone', 'email', 'avatar', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $timestamps = true;
    public function tutor () {
        return $this->belongsTo("App\Tutor");
    }
    public function account () {
        return $this->belongsTo("App\Account");
    }
}
