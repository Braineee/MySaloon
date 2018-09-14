<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = [
        'name',
        'sex',
        'duration',
        'price',
        'picture'
    ];

    public function billing(){
        return $this->belongsToMany('App\Billing');
    }

    public function booking(){
        return $this->belongsToMany('App\Booking');
    }
}
