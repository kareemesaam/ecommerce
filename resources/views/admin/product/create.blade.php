@extends('admin.layout.admin')
@section('content')

 <div class="row">
<!-- left column -->

  <!-- general form elements -->
  <div class="box-form box-primary ">
    <div class="box-form-header with-border text-center">
      <h1 class="box-title ">Add product</h1>
    </div>
    <div class="box-body">
    {{Form::open(['route'=> 'product.store' , 'method' =>'post', 'files' => 'true'] )}}

		<div class="form-groub">
			{{form::label('Name')}}
			{{form::text('name','',['placeholder'=>'enter product name', 'class'=>'form-control'] ) }}
		</div>
		<div class="form-groub">
			{{form::label('description')}}
			{{form::text('desc','',['placeholder'=>'enter product description', 'class'=>'form-control'] ) }}
		</div>
		<div class="form-groub">
			{{form::label('size')}}
			{{form::select('size',['small'=>'Small','medium'=>'Medium','large'=>'Large'],null,[ 'class'=>'form-control'] ) }}
		</div>
		<div class="form-groub">
			{{form::label('category')}}
			<select name="category" class='form-control' >
				<option value="0">add product to....</option>
					@foreach ($categories as $category ) 
						<optgroup label="{{$category->name}}">
							<?php  $child = $category->where('parent_id',$category->id)->get();?>
							@foreach ($child as $child )
							<?php  $subCategories = $child->subCategories ;
							 ?>
								@foreach($subCategories as $subCategory)
									<option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
								@endforeach
							@endforeach
						</optgroup>
		            @endforeach
			</select>

			</div>
		<div class="form-groub">
			{{form::label('price')}}
			{{form::text('price','',['placeholder'=>'enter product price', 'class'=>'form-control'] ) }}
		</div>

		<div class="form-groub">
			{{form::label('photo')}}
			{{form::file('photo[]',['placeholder'=>'enter product photo', 'class'=>'form-control' ,'multiple'=>'yes'] ) }}
		</div>
		
		 <div class="box-footer">
               {{Form::submit('Add',['class'=>'btn btn-primary' ])}}
         </div>

	{{Form::close() }}
</div>
</div>
</div>

@endsection