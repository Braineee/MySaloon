<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'service_type_id',
        'style_id',
        'session'
    ];

    // declaring ORM relationships
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function style(){
        return $this->belongsTo('App\Style');
    }

    public function service(){
        return $this->belongsTo('App\Service');
    }
}
