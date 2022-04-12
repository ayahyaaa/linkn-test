@extends('layouts.app')
@section('content')

<style>
    body{
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('img/background-image.png') }}");
            background-repeat:  no-repeat center center fixed;
            background-size: cover;
            overflow: auto;
        }
</style>

<div class="container">
    <div class="row justify-content-around">
        <div class="col-5 card" style="margin-right:50px;background-color:rgba(252,175,69,0.8);">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" style="text-align: center;border-color:rgba(252,175,69,0.1);">Total clicks</th>
                        </tr>
                        <tr>
                            <td style="font-size:40px;text-align: center;padding:0px;border-color:rgba(252,175,69,0.1);">{{ $sums }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="col-5 card" style="background-color:rgba(245, 96, 64, 0.8);">
            <div class="card-body">
                <table class="table" >
                    <thead>
                        <tr>
                        <th scope="col" style="text-align: center;border-color:rgba(245, 96, 64, 0.1);">Average</th>
                        </tr>
                        <tr>
                        <td style="font-size:40px;text-align: center;padding:0px;border-color:rgba(245, 96, 64, 0.1);">{{ $average }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<br><br>


<div class="container">
    <div class="row">
        <div class="col-12 card" style="background-color:rgba(255, 255, 255, 0.5);border-width:4px;border-radius:10px;border-color:#F77737;">
            <div class="card-body">
                <table class="table">
                    <tbody>   
                    @foreach($mainlinks as $mainlink)
                    <tr style="border-color:rgba(255, 255, 255, 0.5);">
                        <td><b>My Linkn</b></td>
                        <td><b> : </b></td>
                        <td><a class="main-link" href="{{ $mainlink->mainlink }}" >{{ $mainlink->mainlink }}</a></td>
                    </tr>
                    <tr style="border-color:rgba(255, 255, 255, 0.5);">
                        <td><b>Number of visits</b></td>
                        <td><b> : </b></td>
                        <td>{{ $mainlink->views }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<br><br>
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title">Your links</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Url</th>
                        <th scope="col">Visits</th>
                        <th scope="col">Last Visit</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($links as $link)
                    <tr>
                        <td>{{ $link->name }}</td>
                        <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                        <td>{{ $link->visits_count }}</td>
                        <td>{{ $link->latest_visit ? $link->latest_visit->created_at->format('M j Y - H:ia') : 'N/A' }}</td>
                        <td><a href="/dashboard/links/{{ $link->id }}">Edit</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="/dashboard/links/new" class="btn btn-primary">Add Link</a>
            </div>
        </div>
    </div>
</div>
@endsection
