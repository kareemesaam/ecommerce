@extends('admin.layout.admin')
@section('content')
      


{{-- main categories --}}
<div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">menu categories of {{$category->name}} : {{count($childCategory)}} </h3>

              {!! Form::open(['route'=>['category.destroy',$category->id],'method'=>'Post']) !!}
                      {{form::hidden('_method','DELETE')}}
              <div class="box-title pull-right">
                <h2 class="box-title">{{$category->name}}</h2>
                   
                        <button type="submit" class="btn btn-danger">Delete</button>
                        
                      <a href="{{route('category.edit',$category->id)}}" class="btn btn-info" >Edit</a>
                      {{Form::close()}}
                      
              </div>
            </div>
            <!-- /.box-header -->
            @if(count($childCategory)>0)
            <div class="box-body ">
              <table class="table table-bordered ">
                <tr>
               
                 @foreach($childCategory as $child)
              <td width="85%">
                <ul class="sidebar-menu" data-widget="tree">        
                  <li class="treeview">
                  <a href="#">
                    <i class="fa fa-link"></i>
                   <span>{{$child->name}}</span>
                 
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>

                <ul class="treeview-menu">
                   @foreach($child->subCategories as $category)
                            <li>
                                <a href="{{route('SubCategory.show',$category->id)}}">{{$category->name}}</a>
                            </li>  
                  @endforeach
                </ul>
              </li>
           
           </td>
             <td>          
                       {!! Form::open(['route'=>['category.destroy',$child->id],'method'=>'Post']) !!}
                        {{form::hidden('_method','DELETE')}}
                       <button type="submit" class="btn btn-danger">Delete</button>
              
              
                      <a href="{{route('SubCategory.edit',$child->id)}}" class="btn btn-primary" >Edit</a>

                     
                      {{Form::close()}}
                  </td>
                </tr>
              </ul>
          @endforeach    
        

          </table>
        </div>
        @else
           <div class="alert alert-info">
                 <h3>No menu categories to show</h3>
            </div>
        @endif
      </div>
    </div>




   
       

@endsection