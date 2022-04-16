<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'linkn') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-orange shadow-sm">
            <div class="container">
                <a href="http://127.0.0.1:8000">
                    <img class="logo" src="{{ asset('img/logo-shared-330x80.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ 'linkn.at/' . Auth::user()->username }}
                                </a>
                                <!-- Change placeholder link to the one from mainlink table if done -->

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/dashboard/links">Dashboard</a>
                                    <a class="dropdown-item" href="/{{ Auth::user()->username }}" target="_blank" rel="nofollow">Link Page</a>
                                    <a class="dropdown-item" href="/dashboard/settings">Customization</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 row">
            <div class="col">
                @yield('content')
            </div>
            @if (Auth::check())
            <div class="float-end row col-4 text-center align-items-center justify-content-center">
                <h4>Preview</h4>
                <div class="align-items-center justify-content-center my-2" style="flex: 0 0 auto; width: 125px;">
                        <div class="btn-hover btn-active preview-v-btn float-start" id="preview-v-btn"></div>
                        <div class="btn-hover btn-notactive preview-h-btn float-end my-3" id="preview-h-btn"></div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        <div class="preview-v" id="preview" style="background-color: black;">
                            <div class="preview-body-v" id="preview-body" style="background-color: {{ $user->background_color }}; background-image: url('{{ $user->bg_img }}');">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-md-6 offset-md-3">
                                            <div class="custom-pad"></div>
                                            @foreach($user->links as $link)
                                            <div class="link">
                                                <a
                                                class="preview-link d-block p-1 h6 text-center linktext rounded-3"
                                                style="border: 2px solid {{ $user->cards_border_color }}; color: {{ $user->text_color }}"
                                                href="{{ $link->link }}"
                                                target="_blank"
                                                rel="nofollow"
                                                >{{ $link->name }}</a>
                                            </div>
                                            <div class="custom-pad-1"></div>
                                            @endforeach
                                            <div class="custom-pad"></div>
                                            <img src="{{ asset('img/logo-shared-330x80.png') }}" alt="image" class="landing-logo-arrangement w-75">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            @endif
        </main>
    </div>
</body>
    <script>
        const previewV = document.getElementById("preview-v-btn");
        const previewH = document.getElementById("preview-h-btn");
        const preview = document.getElementById("preview");
        const previewBody = document.getElementById("preview-body");
        previewV.addEventListener("click", () => {
            previewH.classList.remove("btn-active");
            previewH.classList.add("btn-notactive");
            previewV.classList.remove("btn-notactive");
            previewV.classList.add("btn-active");

            preview.classList.remove("preview-h");
            preview.classList.add("preview-v");
            previewBody.classList.remove("preview-body-h");
            previewBody.classList.add("preview-body-v");
        });
        previewH.addEventListener("click", () => {
            previewV.classList.remove("btn-active");
            previewV.classList.add("btn-notactive");
            previewH.classList.remove("btn-notactive");
            previewH.classList.add("btn-active");

            preview.classList.remove("preview-v");
            preview.classList.add("preview-h");
            previewBody.classList.remove("preview-body-v");
            previewBody.classList.add("preview-body-h");
        });
    </script>
</html>
