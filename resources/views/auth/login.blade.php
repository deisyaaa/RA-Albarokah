<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Sekolahku adalah aplikasi manajemen sekolah berbasis website yang di bangun dan di kembangkan dengan Framework Laravel">
    <meta name="keywords" content="">
    <meta name="author" content="RA Al Barokah">
    <title>Login Page - RA Al Barokah</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/pages/page-auth.css')}}">
    <!-- END: Page CSS-->

    <style>
        body {
            background: #f0f2f5; /* Background yang lebih lembut */
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-inner {
            width: 100%;
            max-width: 900px;
            background: #fff;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            position: relative;
            display: flex;
            flex-direction: row;
        }

        .auth-bg {
            background-color: #f4f8fb;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 1.5rem 0 0 1.5rem;
        }

        .img-side {
            background: url('{{asset("Assets/Backend/images/illustration/foto_login.png")}}') no-repeat center center;
            background-size: cover;
            width: 100%;
            min-height: 400px;
            border-radius: 1.5rem 0 0 1.5rem;
            transition: transform 0.3s ease;
        }

        .img-side:hover {
            transform: scale(1.05); /* Zoom effect saat hover */
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .brand-logo img {
            width: 80px; /* Memperbesar ukuran logo */
            height: auto;
            margin-right: 3px; /* Menambahkan jarak antara logo dan teks */
        }

        .brand-logo h2 {
            font-size: 1.8rem; /* Menurunkan ukuran teks "RA Al Barokah" agar "RA" lebih kecil */
            color: #007bff;
            font-weight: bold;
            margin: 0;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            padding: 0.75rem 0;
            font-weight: 500;
            border-radius: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.5);
        }

        .alert {
            margin-top: 1rem;
            border-radius: 0.5rem;
        }

        .alert-body {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 992px) {
            .auth-inner {
                flex-direction: column;
            }
            .img-side {
                border-radius: 1.5rem 1.5rem 0 0;
                min-height: 250px;
            }
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="auth-wrapper">
                    <div class="auth-inner">
                        <!-- Login Section -->
                        <div class="col-lg-6 d-flex align-items-center auth-bg">
                            <div class="login-card mx-auto">
                                <!-- Brand logo-->
                                <a class="brand-logo" href="/">
                                    <img src="{{asset('assets/frontend/img/foto_logo.png')}}" alt="Logo"> <!-- Menambahkan logo -->
                                    <h2 class="brand-text text-primary ml-1">RA Al Barokah</h2>
                                </a>

                                <!-- Success/Error Message -->
                                @if($message = Session::get('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-body">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        </div>
                                    </div>
                                @elseif($message = Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        <div class="alert-body">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        </div>
                                    </div>
                                @endif

                                <h2 class="card-title font-weight-bold mb-1">Welcome to RA Al Barokah! 👋</h2>
                                <p class="card-text mb-2">Silakan masuk ke akun Anda</p>
                                <form class="auth-login-form mt-2" action="{{route('login')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="login-email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" id="login-email" type="text" name="email" value="{{old('email')}}" placeholder="Masukan Email" autofocus="" tabindex="1" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">Password</label><a href=""><small>Forgot Password?</small></a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Remember Me</label>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block" tabindex="4">Masuk</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login Section -->

                        <!-- Image Section -->
                        <div class="col-lg-6 img-side d-none d-lg-flex">
                            <!-- Background image applied via CSS -->
                        </div>
                        <!-- /Image Section -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
