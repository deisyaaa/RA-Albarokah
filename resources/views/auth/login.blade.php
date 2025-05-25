{{-- resources/views/auth/login.blade.php --}}
@extends('auth.layout-auth')

@section('title', 'Login')

@section('content')
<div class="auth-wrapper">
    <div class="auth-inner">
        <!-- Login Section -->
        <div class="col-lg-6 d-flex align-items-center auth-bg">
            <div class="login-card mx-auto w-100 p-3">
                <a class="brand-logo d-flex align-items-center" href="/">

                    <img src="{{ asset('assets/frontend/img/foto_logo.png') }}" alt="Logo" width="50" height="50">
                    <h2 class="brand-text text-primary ml-1 mb-0">RA Al Barokah</h2>       
                </a>
                @if($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <div class="alert-body">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert">×</button>
                        </div>
                    </div>
                @elseif($message = Session::get('success'))
                    <div class="alert alert-success">
                        <div class="alert-body">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert">×</button>
                        </div>
                    </div>
                @endif

                <h2 class="card-title font-weight-bold mb-1">Welcome to RA Al Barokah! 👋</h2>
                <p class="card-text mb-2">Silakan masuk ke akun Anda</p>

                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <input type="text" id="login-email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukan Email" autofocus>
                        @error('email')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="login-password">Password</label>
                            <a href="{{ route('password.request') }}">
                                <small>Forgot Password?</small>
                            </a>
                        </div>                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" id="login-password" class="form-control form-control-merge @error('password') is-invalid @enderror" name="password" placeholder="············">
                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group form-check">
                        <input class="form-check-input" id="remember-me" type="checkbox">
                        <label class="form-check-label" for="remember-me">Ingat Saya</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>
            </div>
        </div>
        <!-- /Login Section -->

        <!-- Image Section -->
        <div class="col-lg-6 img-side d-none d-lg-flex">
            <!-- Image by CSS -->
        </div>
        <!-- /Image Section -->
    </div>
</div>
@endsection