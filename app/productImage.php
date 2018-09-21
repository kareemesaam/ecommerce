<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    public function product(){
    	return $this->belongsTo('App\product');
    }
}
