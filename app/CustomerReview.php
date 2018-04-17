<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    protected $table='customer_reviews';
    protected $fillable = ['datetime', 'name', 'phone', 'message'];
    public $timestamps = true;
}
