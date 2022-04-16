@extends('layouts.navbar1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-register card-arrangement">

                <div class="card-body">
                    <br>
                    <img src="{{ asset('img/logo-shared-330x80.png') }}" alt="image" class="logo-arrangement">
                    <br>
                    <br>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-8 offset-md-2btn">
                                <input id="username" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror form-border" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-8 offset-md-2btn">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror form-border" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-8 offset-md-2btn">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror form-border" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-8 offset-md-2btn">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control form-border" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-auto offset-md-2btn">
                                <button type="submit" class="btn btn-login-register">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
