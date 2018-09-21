<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function products(){
    	return $this->hasMany('App\product');
    }

    public function subcategories(){
    	return $this->hasMany('App\subCategory');
    }

}