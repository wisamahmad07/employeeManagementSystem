<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin/css/adminlte.min.css') }}">
</head>


<body class="hold-transition login-page">

    <div class="login-box ">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <img src="{{ url('admin/images/loginagain.jpg') }}" alt="">
            <div class="card-header text-center">
                <br><br><br>
                <a href="#" class="h1"><b>WISAM COMPANY</b></a>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('error_message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> {{ Session::get('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; </span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login in to start your session</p>

                <form action="{{ url('/employee/loginEmployee') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-success btn-block">Login In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                {{-- 
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <div>
        <div class="text-end">
            <h3><a class="btn btn-dark mt-2" href="{{ url('admin/login') }}">Admin Login?</a></h3>
        </div>

        <!-- jQuery -->
        <script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('admin/js/adminlte.min.js') }}"></script>
</body>

</html>
