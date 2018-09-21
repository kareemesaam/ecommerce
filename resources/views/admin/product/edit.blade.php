@extends('admin.layout.admin')
@section('content')

 <div class="row">
<!-- left column -->

  <!-- general form elements -->
  <div class="box-form box-primary ">
    <div class="box-form-header with-border text-center">
      <h1 class="box-title ">Edit product</h1>
    </div>
    <div class="box-body">
    {{Form::open(['route'=> ['product.update',$product->id] , 'method' =>'post', 'files' => 'true'] )}}
    {{form::hidden('_method','PUT') }}

		<div class="form-groub">
			{{form::label('Name')}}
			{{form::text('name',$product->name,['placeholder'=>'enter product name', 'class'=>'form-control'] ) }}
		</div>
		<div class="form-groub">
			{{form::label('description')}}
			{{form::text('desc',$product->desc,['placeholder'=>'enter product description', 'class'=>'form-control'] ) }}
		</div>
		<div class="form-groub">
			{{form::label('size')}}
			{{form::select('size',['small'=>'Small','medium'=>'Medium','large'=>'Large'],$product->size,[ 'class'=>'form-control'] ) }}
		</div>
		
		<div class="form-groub">
			{{form::label('price')}}
			{{form::text('price',$product->price,['placeholder'=>'enter product price', 'class'=>'form-control'] ) }}
		</div>
		<div class="form-groub">
			{{form::label('category')}}
			<select name="category" class='form-control' >
				<option value="0">add subcategory to....</option>
					@foreach ($categories as $category ) 
						<optgroup label="{{$category->name}}">
							<?php  $child = $category->where('parent_id',$category->id)->get();?>
							@foreach ($child as $child )
							<?php  $subCategories = $child->subCategories ;
							 ?>
								@foreach($subCategories as $subCategory)
									<option
									 @if($subCategory->id == $product->sub_category_id)
										selected 
									@endif
								 value="{{$subCategory->id}}">{{$subCategory->name}}</option>
									
								@endforeach
							@endforeach
						</optgroup>
		            @endforeach
			</select>

		</div>

		<div class="form-groub">
			{{form::label('photo')}}
			{{form::file('photo[]',['placeholder'=>'enter product photo', 'class'=>'form-control','multiple'=>'yes'] ) }}
		</div>
		
		 <div class="box-footer">
               {{Form::submit('Update',['class'=>'btn btn-primary' ])}}
         </div>

	{{Form::close() }}
</div>
</div>
</div>

@endsection