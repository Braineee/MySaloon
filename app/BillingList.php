<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingList extends Model
{
    protected $fillable = [
        'billing_id', 
        'item_id', 
        'quantity',
        'price'
    ];

    public function billing(){
        return $this->belongsTo('App\Billing');
    }

    public function accessory(){
        return $this->belongsTo('App\Accessory');
    }
}
