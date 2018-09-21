<?php

namespace App\Http\Resources\subcategory;

use Illuminate\Http\Resources\Json\JsonResource;
use App\category;

class SubCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $cat =$this->category->parent_id ;
        $main = category::find($cat);
        return [
            "id"         => $this->id,
            'name'       => $this->name,
            'category'   => $main->name." => ".$this->category->name, 
            'products'   =>$this->products,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at

        ];
    }
}
