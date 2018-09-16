<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'ref_id', 
        'name', 
        'location',
        'status',
        'picture'
    ];
}
