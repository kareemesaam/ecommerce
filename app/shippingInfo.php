<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shippingInfo extends Model
{
    public function order()
    {
    	return $this->hasOne('App\order');
    }
}
