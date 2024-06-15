<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <style>
    /* Animasi bola-bola */
    .balls-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        pointer-events: none;
        overflow: hidden;
    }

    .ball {
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: #353535;
        border-radius: 50%;
        animation: moveBall 2s infinite linear;
        opacity: 0.6;
    }

    .ball:nth-child(1) {
        top: -10%;
        left: 50%;
        animation-delay: -0.5s;
    }

    .ball:nth-child(2) {
        top: -10%;
        left: 20%;
        animation-delay: -1s;
    }

    .ball:nth-child(3) {
        top: -10%;
        left: 80%;
        animation-delay: -1.5s;
    }

    .ball:nth-child(4) {
        top: -10%;
        left: 10%;
        animation-delay: -2s;
    }

    .ball:nth-child(5) {
        top: -10%;
        left: 90%;
        animation-delay: -2.5s;
    }

    @keyframes moveBall {
        0% {
            transform: translateY(0) rotate(0);
        }

        100% {
            transform: translateY(100vh) rotate(360deg);
        }
    }
    </style>
</head>

<body class="hold-transition login-page">
    <!-- Animasi bola-bola -->
    <div class="balls-container">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
    </div>

    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Login</b> Form</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @if ($errors->has('login'))
                <div class="alert alert-danger">
                    {{ $errors->first('login') }}
                </div>
                @endif
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </form>

                <p class="text-center mt-4">
                    Don't have an account? <a href="{{ route('register') }}">Register</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>