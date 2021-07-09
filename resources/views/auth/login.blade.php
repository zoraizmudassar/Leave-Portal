@extends('layout.authlayout')
@section('title')
<title>Login</title>
@endsection
@section('auth_css')
<script src="{{ asset('css/app.css') }}"></script>
@endsection
@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="{{route('home')}}"><img src="{{ URL::asset('assets/images/logo-dark.png') }}" /></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to access Dashboard</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <!--<input type="email" class="form-control" placeholder="Email">-->
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="icheck-primary">
                            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <!--<input type="checkbox" id="remember">-->
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="social-auth-links text-center mb-3">
                    <button type="submit" class="btn btn-block btn-primary">Sign in
                    </button>
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection

@section('auth_js')
<script src="{{ asset('js/app.js') }}"></script>
@endsection