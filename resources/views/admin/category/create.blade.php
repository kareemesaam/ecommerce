@extends('admin.layout.admin')
@section('content')

 <div class="row">
<!-- left column -->
<div class="col-md-6">
  <!-- general form elements -->
  <div class="box box-primary ">
    <div class="box-header with-border text-center">
      <h1 class="box-title ">Add main||menu category</h1>
    </div>
	    <div class="box-body">
	    {{Form::open(['route'=> 'category.store' , 'method' =>'post'] )}}

	    	<div class="form-groub">
			{{form::label('Name')}}
			{{form::text('name','',['placeholder'=>'enter category name', 'class'=>'form-control'] ) }}
			</div>

			<div class="form-groub">
			{{form::label('parent category')}}
			{{form::select('parent',$categories,0,['class'=>'form-control'] ) }}
			</div>

			<div class="box-footer">
               {{Form::submit('Add',['class'=>'btn btn-primary' ])}}
         	</div>


	    {{Form::close() }}
		</div>
   </div>
</div>




<div class="col-md-6">
  <!-- general form elements -->
  <div class="box box-primary ">
    <div class="box-header with-border text-center">
      <h1 class="box-title ">Add subcategory</h1>
    </div>
	    <div class="box-body">
	    {{Form::open(['route'=> 'SubCategory.store' , 'method' =>'post'] )}}

	    	<div class="form-groub">
			{{form::label('Name')}}
			{{form::text('name','',['placeholder'=>'enter category name', 'class'=>'form-control'] ) }}
			</div>

			<div class="form-groub">
			{{form::label('parent category')}}
			<select name="parent" class='form-control'  >
				<option value="">add subcategory to....</option>
					@foreach ($main as $main ) 
						<optgroup label="{{$main->name}}">
							<?php $child = $category->where('parent_id',$main->id);?>
							@foreach ($child as $child )
								<option value="{{$child->id}}">{{$child->name}}</option>
							@endforeach
						</optgroup>
		            @endforeach
			</select>

			</div>

			

			<div class="box-footer">
               {{Form::submit('Add',['class'=>'btn btn-primary' ])}}
         	</div>


	    {{Form::close() }}
		</div>
   </div>
</div>



</div>
</div>
@endsection