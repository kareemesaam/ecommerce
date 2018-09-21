<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use App\category;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       $cat =$this->subCategory->category->parent_id ;
        $main = category::find($cat);
      
        
          return [
            "id"         => $this->id,
            'name'       => $this->name,
            'desc'       => $this->desc,
            'price'      => $this->price,
            'size'       => $this->size ,
            'category'   => $main->name." => ".$this->subCategory->category->name." => " .$this->subCategory->name,
            "images"     => $this->images ,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at
              
        ];
    }
}
