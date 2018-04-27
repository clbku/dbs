<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutors';
    protected $fillable = [
        'id', 's_id', 'achievement', 'user_id','point','count','updated_at'
    ];
}
