@extends('admin.layout.admin')
@section('content')
      


{{-- main categories --}}
<div class="col-md-12">
          <div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title">product of  : {{$subCategories->name}} </h3>
{!! Form::open(['route'=>['SubCategory.destroy',$subCategories->id],'method'=>'Post']) !!}
                      {{form::hidden('_method','DELETE')}}
              <div class="box-title pull-right">
                <h2 class="box-title">{{$subCategories->name}}</h2>
                   
                        <button type="submit" class="btn btn-danger">Delete</button>
                        
                      <a href="{{route('SubCategory.edit',$subCategories->id)}}" class="btn btn-info" >Edit</a>
                      {{Form::close()}}
                      
              </div>
            </div>
              @if(count($products)>0)
              <div class="box-body">
             <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>image</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>size</th>
                    <th>category</th>
                    <th>price</th>
                    <th>action</th>
                  </tr>
                </thead>
           @foreach($products as $product)    
                <tbody>
                  <tr>
                    <td>

                      <img src="{{asset('image/product/'.$product->images->shift()->image)}}">
                    </td>
                    <td> {{$product->name}} </td>
                    <td width="250px">{{$product->desc}}</td>
                    <td> {{$product->size}}</td>
                    <td>{{$product->subCategory->name}}</td>
                    <td>${{$product->price}}</td>
                    <td>
                      {!! Form::open(['route'=>['product.destroy',$product->id],'method'=>'Post']) !!}
              {{form::hidden('_method','DELETE')}}
              <button type="submit" class="btn btn-danger">Delete</button>
              
              
                      <a href="{{route('product.edit',$product->id)}}" class="btn btn-info" >Edit</a>
                      {{Form::close()}}
                    </td>
                  </tr>
        </tbody>
      @endforeach   
      </table>
      </div>
         @else
           <div class="alert alert-info">
                 <h3>No product to show</h3>
            </div>
        @endif
      </div>
   </div>
       

@endsection