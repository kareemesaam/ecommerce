<?php

namespace App\Http\Resources\order;

use Illuminate\Http\Resources\Json\Resource;

class OrderCollection extends Resource
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
            "id" =>$this->id,
            "user name"=>$this->user->name,
            "delivered"=>$this->delivered,
            "total" =>$this->total,
            'products'=>count($this->products),
            'link'       => [
            'show'    => route('Order.show',$this->id) ,
            'shipping info'=>''
            ] 

        ];
    }
}
