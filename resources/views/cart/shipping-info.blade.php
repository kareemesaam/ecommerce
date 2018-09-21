@extends('layouts.main')

@section('content')


  <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a>
                        </li>
                        <li>Checkout - Address</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        
                            <h1>Checkout</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                            </ul>

                            <div class="content">
                            	{{Form::open(['route'=>'checkout.store','method'=>'post'])}}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Adderss</label>
                                            <input type="text" name="address" class="form-control" id="firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">City</label>
                                            <input type="text" name="city" class="form-control" id="lastname" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company">Country</label>
                                            <input type="text" name="country" class="form-control" id="company" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="street">Zip</label>
                                            <input type="text" name="zip" class="form-control" id="street" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                 <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Telephone</label>
                                            <input type="text" name="phone" class="form-control" id="phone"required>
                                        </div>
                                    </div>
                                 </div> 

                           
                                
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{route('cart.index')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">place an order<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                   
                        <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>{{Cart::subtotal()}}</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>{{Cart::tax()}}</th>
                                    </tr>
                                   
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>{{Cart::total()}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection