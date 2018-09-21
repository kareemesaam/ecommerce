@extends('admin.layout.admin')
@section('content')

     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">product Table</h3>
            </div>
            @if(count($products)>0)
            <!-- /.box-header -->
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

	                  	<img src="{{asset('image/product/'.$product->images[0]->image)}}">
	                  </td>
	                  <td> {{$product->name}} </td>
	                  <td width="250px">{{$product->desc}}</td>
	                  <td> {{$product->size}}</td>
	                  <?php $cat =$product->subCategory->category->parent_id ;
	                  		$main = $categories->find($cat);	
	                  ?>
	                  <td><span style="font-weight: bold" >{{$main->name }}</span> => {{ $product->subCategory->name}}</td>
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
	</div>

@endsection