@extends('admin.layout.admin')
@section('content')

 <div class="row">
<!-- left column -->

  <!-- general form elements -->
  <div class="box-form box-primary ">
    <div class="box-form-header with-border text-center">
      <h1 class="box-title ">Edit category</h1>
    </div>
	    <div class="box-body">
	    {{Form::open(['route'=> ['category.update',$category->id] , 'method' =>'post'] )}}
	    {{form::hidden('_method','PUT')}}
	    	<div class="form-groub">
			{{form::label('Name')}}
			{{form::text('name',$category->name,['placeholder'=>'enter category name', 'class'=>'form-control'] ) }}
			</div>

			<div class="form-groub">
			{{form::label('parent category')}}
			{{form::select('parent',$categories,$category->parent_id,['class'=>'form-control'] ) }}
			</div>

			<div class="box-footer">
               {{Form::submit('update',['class'=>'btn btn-primary' ])}}
         	</div>


	    {{Form::close() }}
		</div>
   </div>
</div>

@endsection