@extends('layouts.links')
@section('content')
<style>
    body {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-image: url("{{ $user->bg_img }}");
        background-repeat:  no-repeat center center fixed;
        background-size: cover;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="custom-pad"></div>
                @foreach($user->links as $link)
                    <div class="link">
                        @if ($user -> cards_type == 1)
                            <a
                                class="user-link d-block p-4 h2 text-center button-showcase-1 linktext"
                                style="border: 2px solid {{ $user->cards_border_color }}; color: {{ $user->text_color }}"
                                href="{{ $link->link }}"
                                target="_blank"
                                rel="nofollow"
                                data-link-id="{{ $link->id }}"
                            >{{ $link->name }}</a>
                        @elseif ($user -> cards_type == 2)
                            <a
                                class="user-link d-block p-4 h2 text-center button-showcase-2"
                                style="border: 2px solid {{ $user->cards_border_color }}; color: {{ $user->text_color }}"
                                href="{{ $link->link }}"
                                target="_blank"
                                rel="nofollow"
                                data-link-id="{{ $link->id }}"
                            >{{ $link->name }}</a>
                        @elseif ($user -> cards_type == 3)
                            <a
                                class="user-link d-block p-4 h2 text-center button-showcase-3"
                                style="border: 2px solid {{ $user->cards_border_color }}; color: {{ $user->text_color }}"
                                href="{{ $link->link }}"
                                target="_blank"
                                rel="nofollow"
                                data-link-id="{{ $link->id }}"
                            >{{ $link->name }}</a>
                        @elseif ($user -> cards_type == 4)
                            <a
                                class="user-link d-block p-4 h2 text-center button-showcase-4"
                                style="border: 2px solid {{ $user->cards_border_color }}; color: {{ $user->text_color }}"
                                href="{{ $link->link }}"
                                target="_blank"
                                rel="nofollow"
                                data-link-id="{{ $link->id }}"
                            >{{ $link->name }}</a>
                        @endif
                    </div>
                    <div class="custom-pad-1"></div>
                @endforeach
                <div class="custom-pad"></div>
                <img src="{{ asset('img/logo-shared-330x80.png') }}" alt="image" class="landing-logo-arrangement">
            </div>
        </div>
    </div>
@endsection
