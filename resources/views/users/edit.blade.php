@extends('layouts.app')

@section('content')
<style>
    body{
        background-image: url("{{ secure_asset('img/bg-img-repeat.png') }}"); 
        background-repeat: center;
        background-size: auto;
    }
</style>
<div style="margin-top:50px"class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2 class="card-title">Customize My Linkn Page</h2>
        <br>
        <form action="/dashboard/settings" method="post">
            <div style="border-width:7px;border-color:#F77736;border-radius:15px;background-color:#F9F9F9"class="card">
                <div style="margin:25px;"class="card-body">
                    <h2 class="card-title">Profile</h2>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="profile_img">Profile Picture</label>
                            <input style="background-color:#fff" type="text" id="profile_img" name="profile_img" class="form-control{{$errors->first('profile_img') ? ' is-invalid' : '' }}" placeholder="url" value="{{ $user->profile_img }}">
                            @if($errors->first('profile_img'))  
                                <div class="invalid-feedback">{{$errors->first('profile_img')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="profile_title">Profile Title</label>
                            <input style="background-color:#fff" type="text" id="profile_title" name="profile_title" class="form-control{{$errors->first('profile_title') ? ' is-invalid' : '' }}" placeholder="nama" value="{{ $user->profile_title }}">
                            @if($errors->first('profile_title'))  
                                <div class="invalid-feedback">{{$errors->first('profile_title')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="bio">Bio</label>
                            <textarea style="background-color:#fff" id="bio" name="bio" rows="10" cols="30"class="form-control{{$errors->first('bio') ? ' is-invalid' : '' }}" placeholder="bio" value="{{ $user->bio }}"></textarea>
                            @if($errors->first('bio'))  
                                <div class="invalid-feedback">{{$errors->first('bio')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div style="border-width:7px;border-color:#F77736;border-radius:15px;background-color:#F9F9F9"class="card">
                <div style="margin:25px;"class="card-body">
                    <h2 class="card-title">Background</h2>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="background_color">Background Color</label>
                            <input style="background-color:#fff" type="text" id="background_color" name="background_color" class="form-control{{$errors->first('background_color') ? ' is-invalid' : '' }}" placeholder="#FFFFFF" value="{{ $user->background_color }}">
                            @if($errors->first('background_color'))  
                                <div class="invalid-feedback">{{$errors->first('background_color')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="bg_img">Background Image Link</label>
                            <input style="background-color:#fff" type="text" id="bg_img" name="bg_img" class="form-control{{$errors->first('bg_img') ? ' is-invalid' : '' }}" placeholder="https://google.png" value="{{ $user->bg_img }}">
                            @if($errors->first('bg_img'))  
                                <div class="invalid-feedback">{{$errors->first('bg_img')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div style="border-width:7px;border-color:#F77736;border-radius:15px;background-color:#F9F9F9"class="card">
                <div style="margin:25px;"class="card-body">
                    <h2 class="card-title">Cards</h2>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="cards_border_color">Cards Border Color</label>
                            <input style="background-color:#fff" type="text" id="cards_border_color" name="cards_border_color" class="form-control{{$errors->first('cards_border_color') ? ' is-invalid' : '' }}" placeholder="#FFFFFF" value="{{ $user->cards_border_color }}">
                            @if($errors->first('cards_border_color'))  
                                <div class="invalid-feedback">{{$errors->first('cards_border_color')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="text_color">Cards Text Color</label>
                            <input style="background-color:#fff" type="text" id="text_color" name="text_color" class="form-control{{$errors->first('text_color') ? ' is-invalid' : '' }}" placeholder="#000000" value="{{ $user->text_color }}">
                            @if($errors->first('text_color'))  
                                <div class="invalid-feedback">{{$errors->first('text_color')}}</div>
                            @endif
                        </div>
                        <div class="col-auto col-md-12">
                            <div class="link user-link d-block p-4 h2 text-center button-showcase-1 button-showcase-pad">1</div>
                            <div class="link user-link d-block p-4 h2 text-center button-showcase-2 button-showcase-pad">2</div>
                            <div class="link user-link d-block p-4 h2 text-center button-showcase-3 button-showcase-pad">3</div>
                            <div class="link user-link d-block p-4 h2 text-center button-showcase-4 button-showcase-pad">4</div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="cards_type">Cards Type</label>
                            <select style="background-color:#fff" id="cards_type" name="cards_type" class="form-control{{$errors->first('cards_type') ? ' is-invalid' : '' }}" value="{{ $user->cards_type }}">
                                <option value="" disabled selected>Select your option</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            @if($errors->first('cards_type'))  
                                <div class="invalid-feedback">{{$errors->first('cards_type')}}</div>
                            @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div style="border-width:7px;border-color:#F77736;border-radius:15px;background-color:#F9F9F9"class="card">
                <div style="margin:25px;"class="card-body">
                    <h2 class="card-title">Layout</h2>
                    <div class="col-12 col-md-6">
                        <label for="layout_type">Layout Type</label>
                        <select style="background-color:#fff" id="layout_type" name="layout_type" class="form-control{{$errors->first('layout_type') ? ' is-invalid' : '' }}" placeholder="1" value="{{ $user->layout_type }}">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        @if($errors->first('layout_type'))  
                            <div class="invalid-feedback">{{$errors->first('layout_type')}}</div>
                        @endif
                        </select>
                    </div>
                </div>
            </div>
            <br><br>
            <div style="border-width:7px;border-color:#F77736;border-radius:15px;background-color:#F9F9F9"class="card">
                <div style="margin:25px;"class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <button style="border:none;background-color:#F77737;color:#fff;width:124px;height:40px;" type="submit" class="btn btn-primary{{ session('success') ? ' is-valid' : ''}}">Save</button>
                            @if(session('success'))
                                <div class="valid-feedback">{{ session('success') }} </div>
                            @endif
                            <br><br>
                        </div>
                    </div>
                    <a style="margin-left:0px;padding-left:0px"class="nav-link" href="/dashboard/links">< Back to Dashboard</a>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
