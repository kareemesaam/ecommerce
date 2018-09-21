<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\shippingInfo;
use App\order ;
class CheckoutController extends Controller
{
    function __construct()
    {
    	$this->middleware('auth');
    }

    public function shipping()
    {
    	return view('cart.shipping-info');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'address'=>'required|min:3',
    		'city'          => 'required|min:3',
            'country'       =>'required|min:3',
            'zip'           =>'required|integer',
            'phone'         =>'required|max:11',
    	]);
    	$info = new shippingInfo();
        $info->address = $request->input('address');
        $info->city    = $request->input('city');
        $info->country = $request->input('country');
       
        $info->zip     = $request->input('zip');
        $info->phone   = $request->input('phone');
        $info->save();

       
        $orders = new order();

        $orders->user_id = Auth::user()->id;
        $orders->total = cart::total();
        $orders->delivered = 0;
        $orders->info_id =$info->id;
        $orders->save();

        $cartitems =  cart::content();

        foreach ($cartitems as $cartitem ) {
            dd($cartitems);
          $orders->products()->attach($cartitem->id,[
            'qty'=> $cartitem->qty,
            'total'=>$cartitem->qty*$cartitem->price
          ]);
        };
        
        

        return redirect('/');
    }
}
