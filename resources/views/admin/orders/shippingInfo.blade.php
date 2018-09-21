@extends('admin.layout.admin')
@section('content')

      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title">shipping informtion</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>phone</th>
                  <th>city</th>
                  <th>country</th>
                  <th>address</th>
                  <th>Zip</th>
                </tr>
                </thead>
                <tbody>    
	                  <tr>                  
		                  <td>{{$shippingInfo->city}}</td>
		                  <td>{{$shippingInfo->country}}</td>
  		                <td>{{$shippingInfo->address}}</td>
                      <td>{{$shippingInfo->zip}}</td>
  	                  <td>{{$shippingInfo->phone}}</td>
	                  </tr>
                   
                </tfoot>
              </table>

            </div>
            <!-- /.box-body -->

          </div>
            <a href="{{route('orders')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> back to orders</a>
          <!-- /.box -->
        </div>
      </div>


@endsection