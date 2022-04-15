@extends('layouts.app')

@section('content')
<style>
    body{
        background-image: url("{{ secure_asset('img/background-image.png') }}");
        background-repeat: no-repeat;
        background-size: auto;
    }
</style>
<div style="margin-top:50px"class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="border-width:7px;border-color:#F77736;border-radius:15px;background-color:#F9F9F9"class="card">

                <div style="margin:25px;"class="card-body">
                    <h2 class="card-title">Create New Link</h2>
                    <form action="/dashboard/links/new" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label>Link Name</label>
                                <input style="background-color:#fff" type="text" id="name" name="name" class="form-control{{$errors->first('name') ? ' is-invalid' : '' }}" placeholder="My link" value="{{old('name')}}">
                                @if($errors->first('name'))
                                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="col-12 col-md-6">
                                <label>Link URL</label>
                                <input style="background-color:#fff" type="text" id="link" name="link" class="form-control{{$errors->first('link') ? ' is-invalid' : '' }}" placeholder="https://mylink.com" value="{{old('link')}}">
                                @if($errors->first('link'))
                                    <div class="invalid-feedback">{{$errors->first('link')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row"><br><br></div>
                        <div class="row">
                            <div class="col-12">
                                @csrf
                                <button style="border:none;background-color:#F77737;color:#fff;width:124px;height:40px;" type="submit" class="btn btn-primary">Save Link</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
