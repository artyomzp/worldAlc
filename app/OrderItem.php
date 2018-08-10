<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    function product()
    {
    	return $this->belongsToMany('\App\Product', '\App\Wine');
    }
}
