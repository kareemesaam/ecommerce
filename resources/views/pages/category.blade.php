@extends('layouts.main')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a>
                        </li>
                        <?php $cat =$subCategory->category->parent_id ;
                            $main = $categories->find($cat);    
                        ?>
                        <li>{{$main->name}} </li>
                        <li>{{ $subCategory->name}}</li>
                    </ul>

 

                    <div class="row products">
                    @if(count($products)> 0)
                @foreach($products as $product)
                    @php $images = $product->images;  
                    @endphp 
                        <div class=" col-md-3 col-sm-4">
                            <div class="product">
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
                                 <a href="#" class="invisible">
                                    <img src="{{asset('image/product/'.$image->image)}}" alt="" class="img-responsive">
                                </a>
                            @endforeach  
                        @endif
                                <a href="#" class="invisible">
                                    <img src="{{asset('image/product/'.$images[0]->image)}}" alt="" class="img-responsive">
                                </a>
                             
                                <div class="text">
                                    <h3>{{$product->name}}</h3>
                                    <p class="price">${{$product->price}}</p>
                                    
                                    <p class="buttons">
                                        <a href="{{route('detail',$product->id)}}" class="btn btn-default">View detail</a>
                                        
                                        <a href="{{route('cart.additem',$product->id)}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                                 </div>
                            <!-- /.product -->
                           
                             </div> 

                             
            @endforeach


                      @else
                       <div class="alert alert-info">
                         <h3>No product to show</h3>
                        </div>
                      @endif
                        </div>
                    
        </div>
    </div>
</div>
</div>


@endsection('content')
