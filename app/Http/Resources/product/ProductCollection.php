<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;
class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

          return [
            'name'       => $this->name,
            'desc'       => $this->desc,
            'price'      => $this->price,
            'link'       => [
            'product'    => route('Product.show',$this->id) ]  
        ];
    }
}
