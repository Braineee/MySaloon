<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_type',
        'service_percentage'
    ];

    public function billing(){
        return $this->belongsToMany('App\Billing');
    }

    public function booking(){
        return $this->belongsToMany('App\Booking');
    }

}
