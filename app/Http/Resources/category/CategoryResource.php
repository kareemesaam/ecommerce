<?php

namespace App\Http\Resources\category;

use Illuminate\Http\Resources\Json\JsonResource;
use App\category;
class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        $menu= category::where('parent_id',$this->id)->get();
         
        foreach ($menu as $cat) {
            $sub =$cat->subCategories;
        }
       
        return [
            "id" =>$this->id,
            "name"  =>    $this->name,
            "parent_id" =>  $this->parent_id,
            "menu category"=> $menu,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
           
        ];
    }
}
