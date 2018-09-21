<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name','desc','price','size','sub_category_id'
    ];
     public function images(){
    	return $this->hasMany('App\productImage');
    }

    public function category(){
    	return $this->belongsTo('App\category');
    }
     public function subCategory(){
    	return $this->belongsTo('App\subCategory');
    }

     public function orders()
    {
    	return $this->belongsToMany('App\order');
    }
}
