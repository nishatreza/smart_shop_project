@extends('frontEnd.master')

@section('title')
    Payment
@endsection

@section('body')


    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="well lead text-center text-success">
                You have to give us product payment information to complete your valuable order. Thanks.
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

            <h3 class="text-center text-success">Payment Info Here</h3>
            <hr>
            <div class="panel addpanel">
                <div class="panel-body">
                    {!! Form::open(['url' => '/new-order', 'class' => 'form-horizontal']) !!}


                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentType" id="cashOnDelivery" value="cashOnDelivery">
                            <label class="form-check-label" for="cashOnDelivery">
                                Cash On Delivery
                            </label>
                            <span class="text-red">  {{$errors->has('paymentType')? $errors->first('paymentType'):''}}</span>

                        </div>

</div>                   </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentType" id="paypal" value="paypal">
                            <label class="form-check-label" for="paypal">
                                Paypal
                            </label>
                            <span class="text-red">  {{$errors->has('paymentType')? $errors->first('paymentType'):''}}</span>

                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentType" id="bkash" value="bkash">
                            <label class="form-check-label" for="bkash">
                                Bkash
                            </label>
                            <span class="text-red">  {{$errors->has('paymentType')? $errors->first('paymentType'):''}}</span>

                        </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-offset-2 col-md-6">
                            <input type="submit" class="btn btn-success btn-block" value="Confirm Order">
                        </div>

                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>



@endsection
