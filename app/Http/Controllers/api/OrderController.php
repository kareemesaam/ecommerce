<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\shippingInfo;
use App\order ;
use App\Http\Resources\order\OrderResource;
use App\Http\Resources\order\ShippingResource;
use App\Http\Resources\order\OrderCollection;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::all(); 


        if(count($orders)>0){
            return  OrderCollection::collection($orders); 
        }
        else{
            return response()->json('No orders to show',404);
        }

    }

    public function store(Request $request)
    {
    	
    	$info = new shippingInfo();
        $info->address = $request->address;
        $info->city    = $request->city;
        $info->country = $request->country;
       
        $info->zip     = $request->zip;
        $info->phone   = $request->phone;
        $info->save();

       
        $orders = new order();

        $orders->user_id = Auth::user()->id;
        $orders->total = cart::total();
        $orders->delivered = 0;
        $orders->info_id =$info->id;
        $orders->save();

        $cartitems =  cart::content();

        foreach ($cartitems as $cartitem ) {

          $orders->products()->attach($cartitem->id,[
            'qty'=> $cartitem->qty,
            'total'=>$cartitem->qty*$cartitem->price
          ]) ;
        };
        
        

        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $order = order::find($id);
         if(isset($order)){
            
            return new OrderResource($order); 
        }
        else{
            return response()->json('No orders to show',404);
        }
       
    }
       public function shippingInfo($id)
    {   
        $info = shippingInfo::find($id);
         if(isset($info)){
            
            return new ShippingResource($info); 
        }
        else{
            return response()->json('No info to show',404);
        }
       
    }

}
