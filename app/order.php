<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function shippingInfo()
    {
    	return $this->belongsTo('App\shippingInfo');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
     public function products()
    {
    	return $this->belongsToMany('App\product')->withPivot('qty','total');
    }
}
