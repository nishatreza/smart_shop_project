<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin-Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="icon" type="image/png" href="{{asset('admin/login/images/icons/favicon.ico')}}"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/vendor/css-hamburgers/hamburgers.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/vendor/animsition/css/animsition.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/vendor/select2/select2.min.css')}}">
        <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/vendor/daterangepicker/daterangepicker.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/login/css/main.css')}}">

    </head>
    <body>



        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url({{asset('admin/login/images/bg-01.jpg')}});">
                        <span class="login100-form-title-1">
                            Sign In
                        </span>
                    </div>




                    {!! Form::open(['url' => 'login']) !!}
                    <div class="login100-form validate-form">

                        <div class="wrap-input100 validate-input" data-validate="Email is required">

                            <div class="form-group">
                                <!--{{ Form::label('email', 'E-Mail Address')}}-->
{{Form::email('email', $value = null,$attributes= $errors->has('email') ? ['class'=>'form-control is-invalid', 'placeholder'=>'email address']:['class'=>'form-control', 'placeholder'=>'email address'])}}
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Email is required">

                            <div class="form-group">
                                <!--{{ Form::label('email', 'E-Mail Address')}}-->
                                {{Form::password('password',$attributes= $errors->has('password') ? array('class'=>'form-control is-invalid', 'placeholder'=>'password'):array('class'=>'form-control', 'placeholder'=>'password'))}} 
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>

                        <div class="container-login100-form-btn">
                            {{Form::submit('SubmiT', ['class' => 'login100-form-btn'])}}  
                        </div>

                    </div>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>

        <script src="{{asset('admin/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('admin/login/animsition/js/animsition.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('admin/login/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('admin/login/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('admin/login/select2/select2.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('admin/login/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('admin/login/daterangepicker/daterangepicker.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('admin/login/countdowntime/countdowntime.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('admin/login/js/main.js')}}"></script>
    </body>
</html>
