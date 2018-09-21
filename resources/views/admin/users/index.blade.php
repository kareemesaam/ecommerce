@extends('admin.layout.admin')
@section('content')

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>action</th>
                </tr>
                @foreach($users as $user) 
               <tr>
               	<td>{{$user->id}}</td>
               	<td>{{$user->name}}</td>
               	<td>{{$user->email}}</td>
               	<td>{{$user->created_at}}</td>
               	<td>
               		@if($user->isAdmin ==0 )
               			<span class="label label-success">User</span>
               		@else
               			<span class="label label-primary">Admin</span>
               		@endif

               	</td>
               	<td>  
               		{!! Form::open(['route'=>['user.destroy',$user->id],'method'=>'Post']) !!}
							{{form::hidden('_method','DELETE')}}
							<button type="submit" class="btn btn-danger">Delete</button>
							
						@if($user->isAdmin ==0 )	
	                  	<a href="{{route('user.change',$user->id)}}" class="btn btn-info" >change to Admin</a>
	                  	@else
	                  	<a href="{{route('user.change',$user->id)}}" class="btn btn-info" >change to user</a>
	                  	@endif

	                  	{{Form::close()}}
	            </td>
               </tr>
               @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection
