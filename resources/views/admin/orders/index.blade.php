@extends('admin.layout.admin')
@section('content')

      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title">{{$type}} orders</h3>
            </div>
            <!-- /.box-header -->
            @if(count($orders)>0)
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>user name</th>
                  <th>product name</th>
                  <th>Quantity</th>
                  <th>price</th>
                  <th>delivered</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
	                
	                  @foreach($order->products as $product)
	                  <tr>
		                  <td>{{$order->user->name}}</td>
		                  <td>{{$product->name}}</td>
		                  <td>{{$product->pivot->qty}}</td>
		                  <td>${{$product->pivot->total}}</td>
		                  {{Form::open(['route'=>['order.delivered',$order->id],'method'=>'post'])}}
		                  <td>{{ Form::checkbox('delivered', '1', $order->delivered=='1'?'true':'')}}
		                  	{{Form::submit('Go',['class'=>'btn btn-primary'])}}
		                  	<a href="{{route('shipping.info',$order->info_id)}}" class="btn btn-success">shipping info</a>
		                  </td>
		                  {{Form::close()}}
	                 
	                </tr>
	                 @endforeach
              	@endforeach
            
              </tbody>

              </table>
            </div>

            <!-- /.box-body -->
            @else
             <div class="alert alert-info">
                 <h3>No orders to show</h3>
             </div>
            @endif
          </div>
          <!-- /.box -->
        </div>
      </div>


@endsection