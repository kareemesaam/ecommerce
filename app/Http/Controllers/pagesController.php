<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\subCategory;
use App\category;
use App\productImage;
class pagesController extends Controller
{
    public function index()
    {
    	$products = product::all();
    	return view('pages.home',compact('products'));
    }
    public function  category($id)
    {
        $subCategory =subCategory::find($id);
        $categories = category::all();
        $products = product::where('sub_category_id',$id)->get();

        return view('pages.category',compact('products','subCategory','categories'));
    }
    public function  detail($id)
    {
        $product = product::find($id);
         $products = product::where('sub_category_id',$product->sub_category_id)->get()->except($id);
        
        return view('pages.details',compact('product','products'));
    }
}
