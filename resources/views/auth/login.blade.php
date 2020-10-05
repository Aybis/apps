<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            html, body { height: unset; }
            .login-box { margin : 15vh auto 0; }
            .login-page {
                background: url('{{ asset('images/bg-login.jpg') }}');
                background-size: cover;
                overflow: hidden;
                position: relative;
                height: 100%;
            }
            .logo-img { max-width: 170px; }
            .login-box-body {
                border-radius: 10px;
                box-shadow: 0 0 20px 1px rgba(204,204,204,.6);
            }
            .app-logo {
                font-size: 20px;
                text-align: center;
                font-weight: 300;

                width: 100%;
                border-bottom: 1px solid #000;
                line-height: 0.1em;
                margin: 10px 0 35px;
            }
            .app-logo span {
                background: #fff;
                padding: 0 10px;
            }
        </style>
        @php ( $cheapsalary = 'ijustmadeiteasyforyou' )
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <!-- <a href="../../index2.html"><b>Super</b>Slim</a> -->
                <img src="{{ asset('images/logo-trans-min.png') }}" class="logo-img">
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->

                <p class="app-logo"><span><b>Kontrak</b></span></p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="form-group has-feedback">
                        <input name="username" type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : '' }}" placeholder="Username" value="{{ old('username') }}" required autofocus>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif

                    </div>
                    <div class="form-group has-feedback">
                        <input name="pwldap" type="password" class="form-control" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <input name="password" type="hidden" value="gloryHorsePower">
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <!-- <a href="#">I forgot my password</a><br> -->
                <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </body>
    </html>
