@extends('admin.layout.admin')
@section('content')
      


{{-- main categories --}}
<div class="col-md-12">
          <div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title">main categories  </h3>
            </div>
            <!-- /.box-header -->
             @if(count($products)>0)
            <div class="box-body ">
              <table class="table table-bordered text-center">
                <tr>
                  <th style="width: 40px">id</th>
                  <th>name</th>
                  
                  <th>action</th>
                </tr>
           @foreach($categories as $category)     
                <tr>
                  <td>{{$category->id}}</td>
                  <td>
                     {{$category->name}}
                  </td>

                  <td>          
                       {!! Form::open(['route'=>['category.destroy',$category->id],'method'=>'Post']) !!}
                        {{form::hidden('_method','DELETE')}}
                       <button type="submit" class="btn btn-danger">Delete</button>
              
              
                      <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary" >Edit</a>

                        <a href="{{route('category.show',$category->id)}}" class="btn btn-info">show
                     </a>
                      {{Form::close()}}
                  </td>
                </tr>
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