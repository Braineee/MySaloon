<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'picture',
        'quantity'
    ];

    public function billing_list(){
        return $this->belongsToMany('App\BillingList');
    }
}
