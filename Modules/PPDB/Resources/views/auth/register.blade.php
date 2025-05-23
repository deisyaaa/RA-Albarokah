<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Sekolahku adalah aplikasi manajemen sekolah berbasis website yang di bangun dan di kembangkan dengan Framework Laravel">
    <meta name="keywords" content="">
    <meta name="author" content="RA Al Barokah">
    <title>Register Page - RA Al Barokah</title>
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

    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/pages/page-auth.css')}}">

    <style>
        body {
            background: #f0f2f5;
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
            max-width: 1100px; /* Meningkatkan lebar form */
            background: #fff;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: row;
        }

        .auth-bg {
            background-color: #f4f8fb;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 1.5rem 0 0 1.5rem;
            width: 50%;
        }

        .img-side {
            background: url('{{asset("Assets/Backend/images/illustration/foto_login.png")}}') no-repeat center center;
            background-size: cover;
            width: 50%; /* Membuat gambar 50% dari lebar */
            min-height: 400px;
            border-radius: 1.5rem 0 0 1.5rem;
        }
         

        .img-side:hover {
            transform: scale(1.05); /* Zoom effect saat hover */
        }


        .login-card {
            width: 100%;
            padding: 2rem;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .brand-logo img {
            width: 80px;
            height: auto;
            margin-right: 3px;
        }

        .brand-logo h2 {
            font-size: 2rem;
            color: #007bff;
            font-weight: bold;
            margin: 0;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 1.5rem; /* Increased margin for spacing */
            display: flex;
            flex-direction: column;
        }

        .form-control {
            width: 100%;
            margin-bottom: 10px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 20px; /* Add space between fields in the row */
        }

        .btn-primary {
            padding: 0.75rem 0;
            font-weight: 500;
            border-radius: 1rem;
            transition: background-color 0.3s ease;
            margin-top: 1.5rem; /* Added space above the button */
        }

        .btn-primary:hover {
            background-color: #0056b3;
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
                width: 100%;
                height: 250px;
                border-radius: 1.5rem 1.5rem 0 0;
            }
            .auth-inner .login-card {
                width: 100%;
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
                        <!-- Register Section -->
                        <div class="auth-bg">
                            <a class="brand-logo" href="/">
                                <img src="{{asset('assets/frontend/img/foto_logo.png')}}" alt="Logo">
                                <h2 class="brand-text text-primary ml-1">RA Al Barokah</h2>
                            </a>

                            @if($message = Session::get('error'))
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    </div>
                                </div>
                            @endif

                            <h2 class="card-title font-weight-bold mb-1">Welcome to RA Al Barokah! 👋</h2>
                            <p class="card-text mb-2">Pendaftaran PPDB RA Al barokah</p>

                            <form class="auth-login-form mt-2" action="{{route('register.store')}}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group" style="flex: 1;">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}" placeholder="Masukan Nama Lengkap" autofocus="" tabindex="1" />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group" style="flex: 1;">
                                        <label class="form-label">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}" placeholder="Masukan Email" tabindex="2" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="flex: 1;">
                                        <label class="form-label">No WhatApp Calon Murid</label>
                                        <input class="form-control @error('whatsapp') is-invalid @enderror" type="text" name="whatsapp" value="{{old('whatsapp')}}" placeholder="Masukan No WhatsApp" tabindex="3" />
                                        @error('whatsapp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group" style="flex: 1;">
                                        <label class="form-label">Password Login</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge @error('password') is-invalid @enderror" type="password" name="password" placeholder="············" tabindex="4" />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge @error('confirm_password') is-invalid @enderror" type="password" name="confirm_password" placeholder="············" tabindex="5" />
                                        <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="6" />
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-block" tabindex="7">Daftar</button>
                            </form>
                        </div>

                        <!-- Image Section -->
                        <div class="img-side d-none d-lg-flex"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('Assets/Backend/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('Assets/Backend/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('Assets/Backend/js/core/app-menu.js')}}"></script>
    <script src="{{asset('Assets/Backend/js/core/app.js')}}"></script>
    <script src="{{asset('Assets/Backend/js/scripts/pages/page-auth-login.js')}}"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>

</html>
