@extends('frontEnd.master')

@section('title')
    Shipping
@endsection

@section('body')


    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="well lead text-center text-success">
          Welcome <b>{{$customerById->firstName.' '.$customerById->lastName}}</b> !     You have to give us product shipping information to complete your valuable order. If your billing info and shipping info are same then just press on Save Shipping Info button. Thanks.
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



        {{--another form for reg--}}


        <div class="col-md-10 col-md-offset-2">
            <span class="text-center text-success">{{Session::get('status')}}</span>

            <h3 class="text-center text-success">Shipping Form Here</h3>
            <hr>
            <div class="panel addpanel">
                <div class="panel-body">
                    {!! Form::open(['url' => '/new-shipping', 'class' => 'form-horizontal', 'name' => 'shippingForm']) !!}


                    <div class="form-group">
                        <div class="control-label col-md-2">Full Name</div>
                        <div class="col-md-6">
                            <input type="text" value="{{$customerById->firstName.' '.$customerById->lastName}}" name="fullName" class="form-control">
                            <span class="text-red">  {{$errors->has('fullName')? $errors->first('fullName'):''}}</span>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="control-label col-md-2">Email Address</div>
                        <div class="col-md-6">
                            <input type="email" name="emailAddress" value="{{$customerById->emailAddress}}" class="form-control">
                            <span class="text-red">  {{$errors->has('emailAddress')? $errors->first('emailAddress'):''}}</span>
                        </div>

                    </div>
                   <div class="form-group">
                        <div class="control-label col-md-2">Address</div>
                        <div class="col-md-6">
                            <textarea id="mytextarea" name="address" class="form-control">{{$customerById->address}}</textarea>
                            <span class="text-red">  {{$errors->has('address')? $errors->first('address'):''}}</span>

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-2">Phone Number</div>
                        <div class="col-md-6">
                            <input type="number" name="phoneNumber" value="{{$customerById->phoneNumber}}" class="form-control">
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
                            <input type="submit" class="btn btn-success btn-block" value="Save Shipping Info">
                        </div>

                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

<script>
    document.forms['shippingForm'].elements['districtName'].value = '{{$customerById->districtName}}' ;
</script>

@endsection
