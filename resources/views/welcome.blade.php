@extends('layouts.app')

@section('content')
<style>
    body{
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-image: url("{{ secure_asset('img/background-image.png') }}");
        background-repeat:  no-repeat center center fixed;
        background-size: cover;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
       
        <h1 class="text-center my-lg-1">The All-in-One Link</h1>
        <img src="{{ secure_asset('img/logo-shared-330x80.png') }}" alt="image" class="logo-arrangement my-lg-5">
        <h2 class="text-center my-lg-5">Create all your links with just one link</h2>
        <a href="{{ route('register') }}" class="btn btn-primary col-2 my-lg-5">Register Now!</a>
        <div class="d-inline-block text-center my-lg-1">
            <h5>Already have an account? <a class="h5" href="{{ route('login') }}">Login</a></h5>
        </div>
        <div class="text-xl-end">
            <h6>powered by <a href="{{URL::to('https://qiwii.id/')}}"><img src="{{ secure_asset('img/logo-qiwii.png') }}" alt="image" href="https://qiwii.id/" class="m-2 w-3 h-3"></a></h6>
        </div>
    </div>
</div>
@endsection