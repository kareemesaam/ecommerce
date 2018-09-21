<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
       public function category(){
    	return $this->belongsTo('App\category');
    }

    public function products(){
    	return $this->hasMany('App\product');
    }
}
