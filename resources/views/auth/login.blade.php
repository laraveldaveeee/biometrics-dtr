{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NTC DTR | Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

</head>

<body>

<div class="login-wrapper">

    <!-- LEFT PANEL -->

    <div class="left-panel">

        <div class="overlay"></div>

        <div class="content">

            <div class="logo-box">

                <div class="logo-icon">

                    <i class="bi bi-fingerprint"></i>

                </div>

                <div>

                    <h2>NTC DTR</h2>

                    <span>Attendance Management System</span>

                </div>

            </div>

            <div class="welcome">

                <h1>

                    Welcome to

                    <br>

                    NTC Attendance System

                </h1>

                <p>

                    Modern Employee Attendance Monitoring

                    <br>

                    Daily Reports • Monthly DTR • Live Monitoring

                </p>

            </div>

            <div class="features">

                <div>

                    <i class="bi bi-check-circle-fill"></i>

                    Employee Attendance Monitoring

                </div>

                <div>

                    <i class="bi bi-check-circle-fill"></i>

                    Daily Attendance Reports

                </div>

                <div>

                    <i class="bi bi-check-circle-fill"></i>

                    Monthly DTR Reports

                </div>

                <div>

                    <i class="bi bi-check-circle-fill"></i>

                    Live Attendance Monitoring

                </div>

            </div>

        </div>

    </div>

    <!-- RIGHT PANEL -->

    <div class="right-panel">

        <div class="login-card">

            <h2>

                Welcome Back

            </h2>

            <p>

                Sign in to continue

            </p>

            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="mb-4">

                    <label class="form-label">

                        Email

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="bi bi-person"></i>

                        </span>

                        <input
                            type="text"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter Email"
                            value="{{ old('email') }}"
                            required>

                    </div>

                    @error('email')

                        <small class="text-danger">

                            {{ $message }}

                        </small>

                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Password

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="bi bi-lock"></i>

                        </span>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter Password"
                            required>

                        <button
                            class="btn btn-light border"
                            type="button"
                            id="togglePassword">

                            <i
                                id="eyeIcon"
                                class="bi bi-eye">

                            </i>

                        </button>

                    </div>

                    @error('password')

                        <small class="text-danger">

                            {{ $message }}

                        </small>

                    @enderror

                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="remember">

                        <label class="form-check-label">

                            Remember Me

                        </label>

                    </div>

                </div>

                <button
                    id="loginBtn"
                    class="btn btn-primary w-100 login-btn">

                    <i class="bi bi-box-arrow-in-right"></i>

                    Sign In

                </button>

            </form>

            <div class="copyright">

                © {{ date('Y') }}

                National Telecommunications Commission

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

const togglePassword=document.getElementById('togglePassword');

const password=document.getElementById('password');

const eye=document.getElementById('eyeIcon');

togglePassword.addEventListener('click',function(){

    if(password.type==='password'){

        password.type='text';

        eye.className='bi bi-eye-slash';

    }else{

        password.type='password';

        eye.className='bi bi-eye';

    }

});

document.querySelector('form').addEventListener('submit',function(){

    document.getElementById('loginBtn').innerHTML='<span class="spinner-border spinner-border-sm"></span> Signing In...';

});

</script>

</body>

</html>