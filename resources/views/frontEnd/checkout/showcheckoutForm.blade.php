@extends('frontEnd.master')

@section('title')
   Checkout
@endsection

@section('body')
<hr>
    <div class="row">
        <div class="col-md-12">
            <div class="well lead text-center text-success">
                You have to login to complete your valuable order. If you are not registered then please login first. Thanks.
            </div>
        </div>

    </div>
    <!--<hr>-->
    {{--@if (session('status'))--}}
        {{--<div class="alert alert-success">--}}
            {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}--}}
        {{--</div>--}}
    {{--@endif--}}
    <div class="row addcategoryrow">
        <div class="col-md-6">
            <span class="text-center text-success">{{Session::get('status')}}</span>

            <h3 class="text-center text-success">Login Form Here</h3>
<hr>
            <div class="panel addpanel">
                <div class="panel-body">
                    {!! Form::open(['url' => '/customer-login', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="control-label col-md-2">Email Address</div>
                        <div class="col-md-6">
                            <input type="email" name="emailAddress" class="form-control">
                            <span class="text-red">  {{$errors->has('emailAddress')? $errors->first('emailAddress'):''}}</span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-2">Password</div>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control">
                            <span class="text-red">  {{$errors->has('password')? $errors->first('password'):''}}</span>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-offset-2 col-md-6">
                            <input type="submit" class="btn btn-success btn-block" value="Login">
                        </div>

                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        {{--another form for reg--}}


        <div class="col-md-6">
            <span class="text-center text-success">{{Session::get('status')}}</span>

            <h3 class="text-center text-success">Registration Form Here</h3>
<hr>
            <div class="panel addpanel">
                <div class="panel-body">
                    {!! Form::open(['url' => '/customer-register', 'class' => 'form-horizontal']) !!}


                    <div class="form-group">
                        <div class="control-label col-md-2">First Name</div>
                        <div class="col-md-6">
                            <input type="text" name="firstName" class="form-control">
                            <span class="text-red">  {{$errors->has('firstName')? $errors->first('firstName'):''}}</span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-2">Last Name</div>
                        <div class="col-md-6">
                            <input type="text" name="lastName" class="form-control">
                            <span class="text-red">  {{$errors->has('lastName')? $errors->first('lastName'):''}}</span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-2">Email Address</div>
                        <div class="col-md-6">
                            <input type="email" name="emailAddress" class="form-control">
                            <span class="text-red">  {{$errors->has('emailAddress')? $errors->first('emailAddress'):''}}</span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-2">Password</div>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control">
                            <span class="text-red">  {{$errors->has('password')? $errors->first('password'):''}}</span>

                        </div>

                    </div>



                    <div class="form-group">
                        <div class="control-label col-md-2">Address</div>
                        <div class="col-md-6">
                            <textarea id="mytextarea" name="address" class="form-control"></textarea>
                            <span class="text-red">  {{$errors->has('address')? $errors->first('address'):''}}</span>

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-2">Phone Number</div>
                        <div class="col-md-6">
                            <input type="number" name="phoneNumber" class="form-control">
                            <span class="text-red">  {{$errors->has('phoneNumber')? $errors->first('phoneNumber'):''}}</span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-2">District Name </div>
                        <div class="col-md-6">
                            <select class="form-control" name="districtName">
                                <option>--- Select District Name ---</option>

                                <option value="Dhaka">Dhaka</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Rajshahee">Rajshahee</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Barisal">Barisal</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Mymensingh">Mymensingh</option>

                            </select>
                            <span class="text-red">  {{$errors->has('districtName')? $errors->first('districtName'):''}}</span>

                        </div>

                    </div>
                    <div class="form-group">

                        <div class="col-md-offset-2 col-md-6">
                            <input type="submit" class="btn btn-success btn-block" value="Registration">
                        </div>

                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>



@endsection
