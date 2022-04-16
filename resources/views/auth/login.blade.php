@extends('layouts.navbar1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card-login card-arrangement">

                <div class="card-body">
                    <br>
                    <img src="{{ asset('img/logo-shared-330x80.png') }}" alt="image" class="logo-arrangement">
                    <br>
                    <br>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-8 offset-md-2btn">
                                <input id="email" style="border: 0px;" type="email" class="form-control @error('email') is-invalid @enderror form-border" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-8 offset-md-2btn">
                                <input id="password" style="border: 0px;" type="password" class="form-control @error('password') is-invalid @enderror form-border" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="offset-md-3">
                                <div class="form-check col-md-8">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-auto offset-md-2btn">
                                <button type="submit" class="btn btn-login-register">
                                    {{ __('Login') }}
                                </button>

                                <a href="{{ route('login.google') }}">
                                    <button type="button" class="btn btn-login-register">
                                        Sign in with Google
                                    </button>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
