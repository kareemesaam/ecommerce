@extends('admin.layout.admin')
@section('content')

 <div class="row">
 
  <!-- general form elements -->
  <div class="box-form box-primary ">
    <div class="box-form-header with-border text-center">
      <h1 class="box-title ">Edit SubCategory</h1>
    </div>
	    <div class="box-body">
	    {{Form::open(['route'=> ['SubCategory.update',$subCategory->id] , 'method' =>'post'] )}}
	    	{{form::hidden('_method','PUT')}}
	    	<div class="form-groub">
			{{form::label('Name')}}
			{{form::text('name',$subCategory->name,['placeholder'=>'enter category name', 'class'=>'form-control'] ) }}
			</div>

			<div class="form-groub">
			{{form::label('parent category')}}
			<select name="parent" class='form-control' >
				
					@foreach ($main as $main ) 
						<optgroup label="{{$main->name}}">
							<?php $child = $category->where('parent_id',$main->id);?>
							@foreach ($child as $child )
								<option 
								
								@if($child->id == $subCategory->category_id)
									selected 
								@endif
								value="{{$child->id}}">{{$child->name}}</option>
							@endforeach
						</optgroup>
		            @endforeach
			</select>

			</div>

			

			<div class="box-footer">
               {{Form::submit('Update',['class'=>'btn btn-primary' ])}}
         	</div>


	    {{Form::close() }}
		</div>
   </div>




</div>
</div>
@endsection