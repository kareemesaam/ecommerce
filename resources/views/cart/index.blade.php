@extends('layouts.main')

@section('content')

 <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have {{Cart::count()}} item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            
                                            <th colspan="2">Tax</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($cartitems as $item)
                                    	<?php
                                    	$product = $product->find($item->id);
                                    	$images = $product->images;
                                    	
                      					?>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="{{asset('image/product/'.$images->shift()->image)}}" alt="White Blouse Armani">
                                                </a>
                                            </td>
                                            <td><a href="#">{{$item->name}}</a>
                                            </td>
                                            <td>
                                            {!!Form::open(['route' => ['cart.update',$item->rowId ], 'method'=> 'post'])!!}
                                            {{form::hidden('_method','put')}}
                                                <input type="number" name="qty"value="{{$item->qty}}" class="form-control">
                                            </td>
                                            <td>{{$item->price}}</td>
                                            
                                            <td>{{$item->tax}}</td>

                                            <td>
                                            
                                            {{form::button('<i class="fa fa-refresh"></i>Update',[
                                            	'type'=>'submit','class'=>'btn btn-default'])}}   
                                             {!! Form::close() !!}
                                         	</td>
                                            <td>
	                                            {!!Form::open(['route' => ['cart.destroy',$item->rowId ],'method'=> 'post'])!!}
						
												{{form::hidden('_method','DELETE')}}
												{{-- <a href="{{route('cart.destroy',$item->rowId)}}"><i class="fa fa-trash-o"></i></a> --}}
												{{form::button('<a><i class="fa fa-trash-o"></i></a>',['type'=>'submit','class'=>'delete'])}}
												{!! Form::close() !!}
											
                                            	
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">{{Cart::total()}}</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{route('home')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                   {{Form::open(['route'=>'checkout','method'=>'get'])}}
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                    {{Form::close()}}
                                </div>
                            </div>

                       

                    </div>
                    <!-- /.box -->
                    




                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>{{Cart::subtotal()}}</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>{{Cart::tax()}}</th>
                                    </tr>
                                   
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>{{Cart::total()}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                   

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

      

@endsection