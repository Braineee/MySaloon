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

    public function Billing(){
        return $this->belongsToMany('App\Billing');
    }
}
