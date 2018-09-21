<?php

namespace App\Http\Resources\order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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
            'link'       => [
            'shipping info'=>route('order.shippingInfo',$this->info_id)
            ],
            'products'=> $this->products,        
            "created_at" => $this->created_at,
            "updated_at"=>$this->updated_at,
            ] ;
        
    }
}
