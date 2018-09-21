

@extends('layouts.main')

@section('content')
	@if(isset($product))

		<div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="{{asset('image/product/'.$product->images[0]->image)}}" alt="" class="img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center">{{$product->name}}</h1>
                                <p class="text-center">{{$product->desc}}</p>
                                
                                <p class="price">${{$product->price}}</p>

                                <p class="text-center buttons">
                                    <a href="{{route('cart.additem',$product->id)}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                                    
                                </p>


                            </div>

                            <div class="row" id="thumbs">
                            	 @foreach($product->images as $image)
                                 <div class="col-xs-4">
                                    <a  href="{{asset('image/product/'.$image->image)}}" class="thumb">
                                    <img src="{{asset('image/product/'.$image->image)}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>


                   
                <div class="  row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>
                       
                        
                       @if(count($products)> 0)
                @foreach($products as $product)
                    @php $images = $product->images;  
                    @endphp 
                        <div class="product col-md-3 col-sm-6">
                            <div class="product same-height">
                                @if(count($images) > 1)
                                <div class="flip-container">
                        
                                    <div class="flipper">
                                        <div class="front">          
                                <img src="{{asset('image/product/'.$images[0]->image)}}" alt="" class="img-responsive">
                                            
                                        </div>
                                        <div class="back">
                                           
                                <img src="{{asset('image/product/'.$images[1]->image)}}" alt="" class="img-responsive">
                                         
                                        </div>
                                    </div>
                                </div>
                        @else
                            @foreach($images as $image)
                                    <div class="flip-container">
                                      <div class="flipper">
                                        <div class="front">
                                            <a href="#">
                                                <img src="{{asset('image/product/'.$image->image)}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="#">
                                                 <img src="{{asset('image/product/'.$image->image)}}" alt="" class="img-responsive">
                                            </a>
                                        
                                        </div>
                                    </div>
                                 </div>
                            @endforeach  
                        @endif
                            <a href="#" class="invisible">
                                    <img src="{{asset('image/product/'.$images[0]->image)}}" alt="" class="img-responsive">
                                    </a
                       			 <div class="text">
                                    <h3>{{$product->name}}</h3>
                                    <p class="price">{{$product->price}}</p>
                                    <p class="buttons">
                                        <a href="{{route('detail',$product->id)}}" class="btn btn-default">View detail</a>
                                        
                                        <a href="{{route('cart.additem',$product->id)}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                        </div>
                             
                    </div>
                          @endforeach
                          @endif
 				</div>

                   
                       
                      
                        

                   
                </div>
            </div>
        </div>
    </div>


               


	@else
	 <div class="alert alert-info">
	     <h3>Not found  product has this id </h3>
	 </div>
 	 @endif


@endsection