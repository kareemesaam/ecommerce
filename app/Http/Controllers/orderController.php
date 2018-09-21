<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\order;
use App\shippingInfo;
use App\Mail\orderShipped;
class orderController extends Controller
{
    public function orders($type='')
    {
        if($type=='pending'){
          $orders = order::where('delivered','0')->get(); 
        }elseif ($type=='delivered') {
           $orders = order::where('delivered','1')->get(); 
        }else{
           $orders = order::all(); 
        }

        return view('admin.orders.index',compact('orders','type'));
    }

    public function delivered(Request $request,$orderId)
    {
       $order = order::find($orderId);
       if($request->has('delivered')){
          mail::to($order->user->email)->send(new orderShipped($order));
          $order->delivered = $request->delivered;
       }else{
          $order->delivered = 0;
       }
       $order->save();
       return back();
    }

    public function shippingInfo(Request $request,$infoId)
    {
      $shippingInfo = shippingInfo::find($infoId);
      
      return view('admin.orders.shippingInfo',compact('shippingInfo')); 
    }
}
